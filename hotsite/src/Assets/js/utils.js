const showHomePanel = (elementName) => {

    const element = document.getElementById(elementName);

    element.style.display = isVisible(element.style.display);
}

const isVisible = (display) => display == 'none' ? 'block' : 'none';
