document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.querySelector('.menu-toggle');
    const containerBouton = document.querySelector('.containerBouton');

    menuToggle.addEventListener('click', () => {
        containerBouton.classList.toggle('show'); // Affiche ou masque le menu
    });
});

//graphique à barre
document.addEventListener("DOMContentLoaded", () => {
    if (typeof insertionData === "undefined") {
        console.error("Les données 'insertionData' ne sont pas définies !");
        return;
    }

    // Dimensions du graphique
    const width = 1800;
    const height = 1200;
    const margin = { top: 50, right: 30, bottom: 100, left: 70 };

    // Création du conteneur SVG
    const svg = d3.select("#insertion-chart")
        .append("svg")
        .attr("width", width)
        .attr("height", height);

    // Préparer les échelles
    const x = d3.scaleBand()
        .domain(insertionData.map(d => d.insertion))
        .range([margin.left, width - margin.right])
        .padding(0.1);

    const y = d3.scaleLinear()
        .domain([0, d3.max(insertionData, d => d.nombre) * 1.1]) // 10% d'espace au-dessus de la barre la plus haute
        .range([height - margin.bottom, margin.top]);

    // Ajouter les barres
    svg.selectAll("rect")
        .data(insertionData)
        .join("rect")
        .attr("x", d => x(d.insertion))
        .attr("y", d => y(d.nombre))
        .attr("height", d => y(0) - y(d.nombre))
        .attr("width", x.bandwidth())
        .attr("fill", "#4e79a7") // Couleur moderne pour les barres
        .on("mouseover", function (event, d) {
            d3.select(this)
                .transition()
                .duration(200)
                .attr("fill", d3.color("#4e79a7").darker(0.7)) // Couleur plus sombre
                .attr("width", x.bandwidth() * 1.1) // Agrandir la barre
                .attr("x", x(d.insertion) - (x.bandwidth() * 0.05)); // Réajuster pour centrer
        })
        .on("mouseout", function () {
            d3.select(this)
                .transition()
                .duration(200)
                .attr("fill", "#4e79a7") // Revenir à la couleur de base
                .attr("width", x.bandwidth()) // Revenir à la largeur d'origine
                .attr("x", d => x(d.insertion)); // Réinitialiser la position
        });

    // Ajouter les pourcentages au-dessus des barres
    const total = d3.sum(insertionData, d => d.nombre);
    svg.selectAll("text.percentage")
        .data(insertionData)
        .join("text")
        .attr("class", "percentage")
        .attr("x", d => x(d.insertion) + x.bandwidth() / 2)
        .attr("y", d => y(d.nombre) - 5) // Légèrement au-dessus des barres
        .attr("text-anchor", "middle")
        .attr("fill", "black")
        .attr("font-size", "12px")
        .text(d => `${((d.nombre / total) * 100).toFixed(1)}%`); // Calcul du pourcentage

    // Ajouter l'axe X
    svg.append("g")
        .attr("transform", `translate(0,${height - margin.bottom})`)
        .call(d3.axisBottom(x))
        .selectAll("text")
        .style("text-anchor", "center")
        .style("font-size", "15px");

    // Ajouter l'axe Y
    svg.append("g")
        .attr("transform", `translate(${margin.left},0)`)
        .call(d3.axisLeft(y).ticks(10))
        .selectAll("text")
        .style("font-size", "20px");

    // Ajouter un titre pour l'axe Y
    svg.append("text")
        .attr("x", -height / 2)
        .attr("y", 20)
        .attr("transform", "rotate(-90)")
        .attr("text-anchor", "middle")
        .style("font-size", "20px")
        .text("Nombre de personnes");


    // Ajouter un titre pour le graphique
    svg.append("text")
        .attr("x", width / 2)
        .attr("y", margin.top / 2)
        .attr("text-anchor", "middle")
        .style("font-size", "30px")
        .style("font-weight", "bold")
        .text("Nos adhérents ont-ils des activités scolaires ou professionnelles ?");
});

//camambert
document.addEventListener("DOMContentLoaded", function () {
    // Vérifier que les données sont bien disponibles
    if (typeof soutienData === "undefined" || !Array.isArray(soutienData)) {
        console.error("Les données 'soutienData' ne sont pas définies ou sont incorrectes.");
        return;
    }

    // Dimensions du graphique
    const width = 700; // Largeur du SVG augmentée
    const height = 700; // Hauteur du SVG augmentée
    const margin = 20;
    const chartRadius = 300; // Rayon du camembert (reste fixe)

    // Sélectionner l'élément où insérer le graphique
    const svg = d3.select("#chart")
        .append("svg")
        .attr("width", width) // Largeur totale du SVG
        .attr("height", height) // Hauteur totale du SVG
        .append("g")
        .attr("transform", `translate(${width / 2}, ${height / 2})`);

    // Couleurs
    const color = d3.scaleOrdinal()
        .domain(soutienData.map(d => d.soutien))
        .range(d3.schemeCategory10);

    // Préparer les données pour le diagramme
    const pie = d3.pie()
        .value(d => d.nombre);
    const data_ready = pie(soutienData);

    // Créer des arcs
    const arc = d3.arc()
        .innerRadius(0)
        .outerRadius(chartRadius); // Taille fixe du rayon

    // Ajouter les sections avec effet de survol
    svg.selectAll('path')
        .data(data_ready)
        .join('path')
        .attr('d', arc)
        .attr('fill', d => color(d.data.soutien))
        .attr("stroke", "white")
        .style("stroke-width", "2px")
        .style("opacity", 0.7)
        .on("mouseover", function (event, d) {
            d3.select(this)
                .transition()
                .duration(200)
                .attr("transform", function () {
                    const [x, y] = arc.centroid(d);
                    return `translate(${x * 0.1}, ${y * 0.1}) scale(1.1)`;
                });
        })
        .on("mouseout", function () {
            d3.select(this)
                .transition()
                .duration(200)
                .attr("transform", "translate(0,0) scale(1)");
        });

    // Ajouter les labels
    svg.selectAll('text')
        .data(data_ready)
        .join('text')
        .text(d => `${d.data.soutien}: ${((d.data.nombre / d3.sum(soutienData, d => d.nombre)) * 100).toFixed(1)}%`)
        .attr("transform", d => `translate(${arc.centroid(d)})`)
        .style("text-anchor", "middle")
        .style("font-size", "12px");
});


