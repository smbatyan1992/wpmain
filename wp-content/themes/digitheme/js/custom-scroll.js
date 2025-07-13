function observeElements(targetClass, showClass, threshold) {
    const elements = document.querySelectorAll(targetClass);
    let classNameWithoutDot = targetClass.substring(1);
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
        if (entry.isIntersecting && entry.target.classList.contains(classNameWithoutDot)) {
            entry.target.classList.add(showClass);
        }
        });
    }, {
        threshold: threshold
    });
    elements.forEach(element => {
        observer.observe(element);
    });
}

// Call the function with desired parameters
observeElements('.text-with-bg', 'text-with-bg-show', 0.5);

