//Color Box Function
function toggleOthersTextBox() {
    var colorThemeSelect = document.getElementById('colorThemeSelect');
    var othersTextBoxContainer = document.getElementById('othersTextBoxContainer');

    if (colorThemeSelect.value === 'Others') {
        othersTextBoxContainer.style.display = 'block';
    } else {
        othersTextBoxContainer.style.display = 'none';
    }
}

// Function to show the selected color in the color box
function showSelectedColor() {
    var colorThemeSelect = document.getElementById('colorThemeSelect');
    var selectedColor = colorThemeSelect.value;
    var colorBox = document.getElementById('colorBox');

    if (selectedColor !== 'Colour Theme') {
        colorBox.style.display = 'block';

        // Set the color of the color box based on the selected option
        switch (selectedColor) {
            case 'Red':
                colorBox.style.backgroundColor = '#FF0000';
                break;
            case 'Navy Blue':
                colorBox.style.backgroundColor = '#000080';
                break;
            case 'Silver':
                colorBox.style.backgroundColor = '#C0C0C0';
                break;
            default:
                colorBox.style.backgroundColor = selectedColor;
                break;
        }
    } else {
        colorBox.style.display = 'none';
    }
}

