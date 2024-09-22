document.querySelector('[data-widget="pushmenu"]').addEventListener('click', function() {
    var containerLogo = document.getElementById('container-logo');
    var containerSmallLogo = document.getElementById('container-small-logo');
    
    if (!containerLogo.classList.contains('hidden')) {
        containerLogo.classList.add('hidden');
        containerSmallLogo.classList.remove('hidden');
    } else {
        containerSmallLogo.classList.add('hidden');
        containerLogo.classList.remove('hidden');
    }
});
