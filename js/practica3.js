const btn = document.getElementById('btn-enviar');
const url = window.location.href + 'practica3.php?id=';
const persons = document.getElementById('personas');
const container = document.getElementById('resultado');

let array = [];

const getPersons = () => {
  let queryPersons = [];
  for (let person of persons) {
    fetch(url + person.value)
      .then((Response) => {
        if (Response.status >= 200 && Response.status < 300) {
          return Response.text();
        }
      })
      .then((Response) => {
        let person = JSON.parse(Response);
        queryPersons.push(person);
        // console.log(person);
        // console.log(queryPersons);
      });
  }

  array = queryPersons;
};

getPersons();

const printPersons = () => {
  // console.log(array);
  for (let person of array) {
    container.innerHTML += `
		<div class="col-4">
			<div class="card" style="width: 18rem; margin: 10px;">
				<div class="card-header bg-info">
					<h5 class="text-white"> ${person.apellidos}</h5>
				</div>
				<div class="card-body">
					<strong>ID:</strong> ${person.idpersona}
					<br />
					<strong>CORREO:</strong> ${person.correo}
					<br />
					<strong>PAÍS:</strong> ${person.pais}
					<br />
					<strong>ESTADO / PROVINCIA:</strong> ${person.estado}
					<br />
					<strong>MUNICIPIO / CONDADO:</strong> ${person.municipio}
				</div>
			</div>
			</div>
			`;
  }
};

btn.addEventListener('click', function () {
  container.innerHTML = '';
  printPersons();
  getPersons();
});
