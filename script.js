const btn = document.querySelector('button')
const search = document.querySelector('#search-movie')



let title = []

search.addEventListener('keydown' , () => {
    
    const movie = {
        method : 'GET' ,
        name : search.value
    }

    fetch(`site.php?name=${movie.name}` , movie )
        .then((response) => {
          return response.json()
        })
            .then((response) => {
                 
               title.push(response.nome_filme)

               div.innerHTML = `<a href=search.php?query=${response.nome_filme}>${response.nome_filme}</a>`
               
            }).catch((error) => {
                
            })

           
})

function mouseMove(){
    search.focus() 
    
}

function mouseOut(){
    search.blur()
}

search.addEventListener('mouseenter' , mouseMove)
search.addEventListener('mouseout' , mouseOut)