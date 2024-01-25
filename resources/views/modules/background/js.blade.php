document.querySelector(".module").addEventListener("click", function() {
    var clickoutUrl = "{{ $clickout ?? '#' }}";
    window.open(clickoutUrl, '_blank');
});
