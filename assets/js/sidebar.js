let show = true
let main = document.getElementById('main')
let sidebar = document.getElementById('sidebar')
console.log(main)
function toggleSidebar(){
    show = !show
    /* Show true jadi false saat diklik */
    if(show == true){
        sidebar.classList.remove('hidden')
        main.classList.remove('full-width')
    }else{
        sidebar.classList.add('hidden')
        main.classList.add('full-width')
    }
}