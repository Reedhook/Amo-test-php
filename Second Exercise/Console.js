function showFields() {
    var element = document.querySelector('[name="type_val"]');
    var allFields = document.querySelectorAll('[name]');
    for (var i = 0; i < allFields.length; i++) {
        if (allFields[i].tagName === 'SELECT') {
            continue; // Пропускаем элемент <select>
        }

        var fieldName = allFields[i].getAttribute('name')
        var parentElement = allFields[i].parentNode

        if (fieldName.indexOf(element.value) !== -1) {
            if (allFields[i].hasAttribute('hidden')) {
                allFields[i].removeAttribute('hidden');
                parentElement.removeAttribute('hidden');
            }
        } else {
            allFields[i].setAttribute('hidden', true);
            parentElement.setAttribute('hidden', true);
        }
    }
}