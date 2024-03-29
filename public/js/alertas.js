// The main class
var AlertBox = function (id, option) {
    this.show = function (msg) {
        if (msg === '' || typeof msg === 'undefined' || msg === null) {
            throw '"msg parameter is empty"';
        } else {
            var alertArea = document.querySelector(id);
            var alertBox = document.createElement('DIV');
            var alertContent = document.createElement('DIV');
            var alertClose = document.createElement('A');
            var alertClass = this;
            alertContent.classList.add('alert-content');
            alertContent.innerText = msg;
            alertClose.classList.add('alert-close');
            alertClose.setAttribute('href', '#');
            alertBox.classList.add('alert-box');
            alertBox.appendChild(alertContent);
            if (!option.hideCloseButton || typeof option.hideCloseButton === 'undefined') {
                alertBox.appendChild(alertClose);
            }
            alertArea.appendChild(alertBox);
            alertClose.addEventListener('click', function (event) {
                event.preventDefault();
                alertClass.hide(alertBox);
            });
            var alertTimeout = setTimeout(function () {
                alertClass.hide(alertBox);
                clearTimeout(alertTimeout);
            }, option.closeTime);
            if (option.success) {
                alertBox.classList.add('alert-success');
            } else {
                alertBox.classList.add('alert-error');
            }
        }
    };

    this.hide = function (alertBox) {
        alertBox.classList.add('hide');
        var disperseTimeout = setTimeout(function () {
            alertBox.parentNode.removeChild(alertBox);
            clearTimeout(disperseTimeout);
        }, 500);
    };
};

// Sample invoke
var alertboxSucces = new AlertBox('#alert-area', {
    closeTime: 4000,
    persistent: false,
    hideCloseButton: false,
    success: true
});

var alertboxError = new AlertBox('#alert-area', {
    closeTime: 4000,
    persistent: false,
    hideCloseButton: false,
    success: false
});