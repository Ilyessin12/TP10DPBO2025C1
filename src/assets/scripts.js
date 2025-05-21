document.addEventListener('DOMContentLoaded', function(){
    // 1. Active Navigation Link
    const navLinks = document.querySelectorAll('header nav ul li a');
    const currentUrl = window.location.href;
    const currentPathAndQuery = window.location.pathname + window.location.search;

    let isActiveSet = false;
    navLinks.forEach(link =>{
        try{
            // Use link.href as it's the fully resolved URL
            const linkUrl = new URL(link.href);
            const linkPathAndQuery = linkUrl.pathname + linkUrl.search;

            if(linkPathAndQuery === currentPathAndQuery){
                link.classList.add('active');
                isActiveSet = true;
            }
        }catch(e){
            console.error("Error parsing link href for active state: ", link.href, e);
        }
    });

    if(!isActiveSet){
        const currentSearchParams = new URLSearchParams(window.location.search);
        let currentEntity = currentSearchParams.get('entity');

        // If no entity in URL, and on root/index.php, assume default entity (phenomena_reports)
        if(!currentEntity && (window.location.pathname.endsWith('/') || window.location.pathname.endsWith('index.php') || window.location.pathname.split('/').pop() === '')){
            currentEntity = 'phenomena_reports'; // Default entity as per index.php logic
        }

        if(currentEntity){
            navLinks.forEach(link =>{
                try{
                    const linkUrl = new URL(link.href);
                    const linkSearchParams = new URLSearchParams(linkUrl.search);
                    const linkEntity = linkSearchParams.get('entity');
                    const linkAction = linkSearchParams.get('action');

                    if(linkEntity === currentEntity && linkAction === 'list'){
                        link.classList.add('active');
                    }
                }catch(e){ /* ignore parsing errors for non-primary links */ }
            });
        }
    }

    // 2. Scroll to Top Button
    const scrollToTopBtn = document.createElement('button');
    scrollToTopBtn.innerHTML = '&uarr;'; // Up arrow
    scrollToTopBtn.setAttribute('id', 'scrollToTopBtn');
    
    // Basic styling via JS. For more complex styling, use CSS classes.
    // Consider moving these styles to your styles.css file for better maintainability.
    Object.assign(scrollToTopBtn.style, {
        position: 'fixed',
        bottom: '30px',
        right: '30px',
        display: 'none', // Initially hidden
        padding: '10px 15px',
        backgroundColor: 'var(--accent-color-red)', // Using CSS variable
        color: 'var(--primary-text-color)',     // Using CSS variable
        border: 'none',
        borderRadius: '5px',
        cursor: 'pointer',
        fontSize: '18px',
        zIndex: '1000',
        boxShadow: '0 2px 5px rgba(0,0,0,0.3)',
        transition: 'opacity 0.3s, visibility 0.3s' // Smooth appearance
    });
    document.body.appendChild(scrollToTopBtn);

    window.onscroll = function(){
        if(document.body.scrollTop > 100 || document.documentElement.scrollTop > 100){
            scrollToTopBtn.style.display = 'block';
            scrollToTopBtn.style.opacity = '1';
            scrollToTopBtn.style.visibility = 'visible';
        }else{
            scrollToTopBtn.style.opacity = '0';
            // Hide after transition
            setTimeout(() => {
                if (!(document.body.scrollTop > 100 || document.documentElement.scrollTop > 100)) {
                     scrollToTopBtn.style.display = 'none';
                     scrollToTopBtn.style.visibility = 'hidden';
                }
            }, 300); // Match transition duration
        }
    };

    scrollToTopBtn.onclick = function(){
        window.scrollTo({top: 0, behavior: 'smooth'});
    };

    // 3. "Cool" effect: Fade in content boxes on scroll
    const contentBoxes = document.querySelectorAll('.content-box');

    if('IntersectionObserver' in window){
        const observerOptions = {
            root: null, // viewport
            rootMargin: '0px',
            threshold: 0.1 // 10% of item is visible
        };

        const observerCallback = (entries, observer) =>{
            entries.forEach(entry =>{
                if(entry.isIntersecting){
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    // Optional: unobserve after animation to save resources
                    // observer.unobserve(entry.target); 
                }else{
                    // Optional: Reset if you want animation to replay when scrolling out and back in
                    // This might be too much if elements are frequently scrolled in/out
                    // entry.target.style.opacity = '0';
                    // entry.target.style.transform = 'translateY(20px)';
                }
            });
        };

        const contentObserver = new IntersectionObserver(observerCallback, observerOptions);

        contentBoxes.forEach(box =>{
            // Initial state for animation
            box.style.opacity = '0';
            box.style.transform = 'translateY(20px)';
            box.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
            contentObserver.observe(box);
        });
    }else{
        // Fallback for older browsers that don't support IntersectionObserver
        // Simply make them visible
        contentBoxes.forEach(box =>{
            box.style.opacity = '1';
            box.style.transform = 'translateY(0)';
        });
        console.log("IntersectionObserver not supported, fade-in effect will be static.");
    }
});
