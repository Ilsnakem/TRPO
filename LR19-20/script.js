const form = document.getElementById('userDataForm');
const savedDataDiv = document.getElementById('savedData');

form.addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(form);
    const userData = {};
    for (const [key, value] of formData.entries()) {
        userData[key] = value;
    }

    // Сохранение данных в cookie
    document.cookie = `userDataCookie=${JSON.stringify({fio, email, birthplace, hobbies})}; expires=Fri, 31 Dec 9999 23:59:59 GMT;`;
    alert(document.cookie);
    //document.cookie = userDataCookie=${JSON.stringify(userData)}; expires=Fri, 16 Feb 2024 23:59:59 GMT;
    
    //<code style="color: red;">document.cookie = userDataCookie=${JSON.stringify(userData)}; expires=Fri, 31 Dec 9999 23:59:59 GMT;</code>

    // Сохранение данных в local storage
    localStorage.setItem('userDataLocalStorage', JSON.stringify(userData));

    // Сохранение данных в json файл
    fetch('saveData.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(userData)
    });

    displaySavedData(userData);
});

function displaySavedData(userData) {
    savedDataDiv.innerHTML = '';
    for (const [key, value] of Object.entries(userData)) {
        savedDataDiv.innerHTML += <p><strong>${key}:</strong> ${value}</p>;
    }
}

// Проверка наличия сохраненных данных в cookie
const userDataCookie = document.cookie.split('; ').find(row => row.startsWith('userDataCookie='));
if (userDataCookie) {
    const userData = JSON.parse(userDataCookie.split('=')[1]);
    displaySavedData(userData);
}

// Проверка наличия сохраненных данных в local storage
const userDataLocalStorage = localStorage.getItem('userDataLocalStorage');
if (userDataLocalStorage) {
    const userData = JSON.parse(userDataLocalStorage);
    displaySavedData(userData);
}
