<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AppVerk - zadanie rekrutacyjne FullStack Developer 2024</title>
    <link rel="stylesheet" href="reset.css" />
    <link rel="stylesheet" href="styles.css" />
</head>
<body class="body">
<nav class="nav">
    <img src="/logo.svg" alt="logo" />
    <button class="button">GENERATE FILES</button>
</nav>
<main class="main">
    <section class="pane available-modules-pane">
        <h3>AVAILABLE MODULES</h3>
        <button class="available-modules-pane__button button">
            BACKGROUND
        </button>
        <button class="available-modules-pane__button button">
            TYPO
        </button>
    </section>
    <section class="pane selected-module-pane">
        <h3>SELECTED MODULE</h3>
        <div class="selected-module-pane__module">
            <span>BACKGROUND</span>
        </div>
    </section>
    <section class="pane module-settings-pane">
        <h3>MODULE SETTINGS</h3>
        <div class="form-group">
            <label for="clickout">Clickout</label>
            <div>
                <input
                    id="clickout"
                    type="text"
                    name="clickout"
                    placeholder="https://appverk.com"
                    value="https://appverk.com"
                />
            </div>
        </div>
    </section>
</main>
</body>
</html>
