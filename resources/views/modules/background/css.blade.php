:root {
    --gray-light: #F3F3F3;
    --gray-dark: #3E454B;
    --orange: #FF9B00;
    --white: #FFFFFF
}

.body {
    width: 100%;
    height: 100%;
    font-family: ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    margin: 0;
    padding: 0;
}

.main {
    width: 100%;
    height: 100vh;
    position: relative;
}

.module {
    position: absolute;
    cursor: pointer;
    background-color: var(--orange);
    width: {{ $width }}%;
    height: {{ $height }}%;
    left: {{ $positionX }}%;
    top: {{ $positionY }}%;
}
