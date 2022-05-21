function theme(){
    const button_theme = document.getElementById('change_theme');

    let el = document.documentElement
    
    button_theme.addEventListener('click', () => {

        if(el.hasAttribute('theme')){
            el.removeAttribute('theme')
            localStorage.removeItem('theme')

        } else {
            el.setAttribute('theme', 'dark')
            localStorage.setItem('theme', 'dark')
        }
    })
    
    if(localStorage.getItem('theme') !== null){
        el.setAttribute('theme', 'dark')
    }
}

theme()