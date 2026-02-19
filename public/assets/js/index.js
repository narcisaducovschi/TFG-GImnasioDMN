
const faqs = document.querySelectorAll('.faqs-container');

faqs.forEach(faq => {
    const question = faq.querySelector('.faqs-question');
    const content = faq.querySelector('.faqs-content');


    content.style.transition = "height 0.3s ease, padding 0.3s ease";

    question.addEventListener('click', () => {
        const isActive = faq.classList.contains('active');

        faqs.forEach(item => {
            const c = item.querySelector('.faqs-content');
            c.style.height = 0;
            item.classList.remove('active');
        });

        if (!isActive) {
            faq.classList.add('active');
            content.style.height = content.scrollHeight + "px";
        }
    });

});