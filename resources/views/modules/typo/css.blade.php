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

.container {
    padding: 6px;
    overflow: hidden;
}

p {
    color: var(--gray-dark);
    margin: 4px;
    padding: 0;

}

.module {
    position: absolute;
    cursor: pointer;
    border: 1px solid var(--orange);
    width: {{ $width }}%;
    height: {{ $height }}%;
    left: {{ $positionX }}%;
    top: {{ $positionY }}%;
}
