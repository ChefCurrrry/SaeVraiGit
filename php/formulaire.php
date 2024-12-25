<?php
if(!session_id())
    session_start();

require_once 'headerFormulaire.php';

?>
<div class="container">
<div class="form-container">
    <h1>Enquête - Merci de répondre aux questions suivantes</h1>
    <form method="post" action="actionFormulaire.php">

        <h2>1. Qui a répondu à l'enquête ?</h2>
        <label for="nom">Quel est votre nom ?</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="prenom">Quel est votre prénom ?</label>
        <input type="text" id="prenom" name="prenom" required><br><br>

        <label for="age">Quel est votre âge ?</label>
        <input type="number" id="age" name="age" min="15" maxlength="2" required><br><br>


        <h2>2. Lieu de vie</h2>
        <label for="region">Dans quelle région habitez-vous ?</label>
        <select id="region" name="region" required>
            <option value="">--Sélectionnez votre région--</option>
            <option value="Auvergne-Rhône-Alpes">Auvergne-Rhône-Alpes</option>
            <option value="Bourgogne-Franche-Comté">Bourgogne-Franche-Comté</option>
            <option value="Bretagne">Bretagne</option>
            <option value="Centre-Val de Loire">Centre-Val de Loire</option>
            <option value="Corse">Corse</option>
            <option value="Grand Est">Grand Est</option>
            <option value="Hauts-de-France">Hauts-de-France</option>
            <option value="Île-de-France">Île-de-France</option>
            <option value="Normandie">Normandie</option>
            <option value="Nouvelle-Aquitaine">Nouvelle-Aquitaine</option>
            <option value="Occitanie">Occitanie</option>
            <option value="Pays de la Loire">Pays de la Loire</option>
            <option value="Provence-Alpes-Côte d'Azur">Provence-Alpes-Côte d'Azur</option>
            <option value="Outre-Mer">Outre-Mer</option>
        </select><br><br>


        <h2>3. Insertion professionnelle et sociale</h2>
        <label for="insertion">Quelle est votre situation actuelle ?</label>
        <select id="insertion" name="insertion" required>
            <option value="">--Sélectionnez votre situation--</option>
            <option value="Scolarité en milieu ordinaire">Scolarité en milieu ordinaire</option>
            <option value="Scolarité en dispositif spécialisé">Scolarité en dispositif spécialisé de l'éducation nationale</option>
            <option value="Instruction en famille">Instruction en famille (École à la maison)</option>
            <option value="Scolarité médico-social">Scolarité dans un établissement médico-social (IME, IMPRO...)</option>
            <option value="Formations professionnelles">Formations professionnelles</option>
            <option value="Études supérieures">Études supérieures</option>
            <option value="Activités en milieu protégé">Activités professionnelles en milieu protégé (ESAT, Entreprise adaptée...)</option>
            <option value="Sans activité">Sans aucune activité scolaire ou professionnelle</option>
            <option value="Autre">Autre</option>
        </select><br><br>


        <h2>4. Qualité de vie</h2>
        <label for="qualite">Comment décririez-vous votre qualité de vie actuelle ?</label>
        <select id="qualite" name="qualite" required>
            <option value="">--Sélectionnez ce qui vous concerne--</option>
            <option value="Tout va bien">Tout va bien</option>
            <option value="Restriction sociale">Restriction de la vie sociale</option>
            <option value="Souffrance psychologique">Souffrance psychologique</option>
            <option value="Fatigue">Fatigue, épuisement</option>
            <option value="Réduction professionnelle">Réduction d'activités professionnelles</option>
            <option value="Coûts financiers">Coûts financiers importants</option>
            <option value="Impacts sur la fratrie">Impacts négatifs sur la fratrie</option>
            <option value="Conflits familiaux">Conflits familiaux</option>
            <option value="Maladie">Maladie, difficultés à prendre soin de soi-même</option>
            <option value="Éloignement">Éloignement de la personne</option>
        </select><br><br>


        <h2>5. Besoin de soutien</h2>
        <label for="soutien">Avez-vous besoin d'un soutien particulier ?</label>
        <select id="soutien" name="soutien" required>
            <option value="">--Sélectionnez votre besoin--</option>
            <option value="Autonome">Non, je suis autonome</option>
            <option value="Aide 24h/24">Une aide pour tous les actes de la vie quotidienne et la présence d'une tierce personne 24 heures sur 24</option>
            <option value="Soutien à l'autonomie">Un soutien à l'autonomie pour le logement, l'accès à la santé, les loisirs, les démarches administratives</option>
            <option value="Interventions ponctuelles">Des interventions et des stimulations ponctuelles mais quotidiennes (toilettes, sorties, repas, communication...)</option>
        </select><br><br>

        <button type="submit" onclick="window.location.href='compte.php';">Envoyer</button>
    </form>
</div>
</div>
<?php
require_once 'footer.php';