
let lista = document.querySelector('#lista');


const ObtenerApiTrello = async() => {
    try {
        const response = await axios.get('https://api.trello.com/1/boards/615e121e55742a5a6ba346bc/cards?key=8b326737f43e5a629e80b9c95b0a6016&token=fcd44ca66295583ff083eb88f93ef882c4836355b6edce681b2b9fc631c15517')

		// Si la respuesta es correcta
		if(response.status === 200){

			console.log(response);
    
			
			response.data.forEach(datos => {
				lista.innerHTML += `

                    <li class="lista" id="lista">${datos.name}</li>
                
				`;
			});
        
		} else if(response.status === 401){
			console.log('Pusiste la llave mal');
		} else if(response.status === 404){
			console.log('El board de trello no existe');
		} else {
			console.log('Hubo un error y no sabemos que paso');
        }

	} catch(error){
		console.log(error);
	}    
}
 
ObtenerApiTrello();

