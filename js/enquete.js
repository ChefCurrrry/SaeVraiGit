function limitDigits(input) {
    if (input.value.length > 2) {
        input.value = input.value.slice(0, 2); // Coupe à 2 caractères
    }
}