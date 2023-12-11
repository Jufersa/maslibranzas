
  document.getElementById('submit').addEventListener('click', function() {
    // Obtener datos del formulario
    var pagaduria = document.getElementById('pagaduria').value;
    var name = document.getElementById('name').value;
    var lastName = document.getElementById('lastName').value;
    var typeDocument = document.getElementById('typeDocument').value;
    var numDoc = document.getElementById('numDoc').value;
    var codigo = document.getElementById('codigo').value;
    var phone = document.getElementById('phone').value;
    var email = document.getElementById('email').value;
    var checkDefault = document.getElementById('checkDefault').checked;

    // Construir objeto con datos del formulario
    var formData = {
      pagaduria: pagaduria,
      name: name,
      lastName: lastName,
      typeDocument: typeDocument,
      numDoc: numDoc,
      codigo: codigo,
      phone: phone,
      email: email,
      checkDefault: checkDefault
    };

    // Enviar datos al servidor utilizando Axios
    axios.post('/ruta-al-servidor', formData)
      .then(function (response) {
        // Manejar respuesta del servidor si es necesario
        console.log(response.data);
        alert('Formulario enviado con éxito');
      })
      .catch(function (error) {
        console.error('Error al enviar el formulario:', error);
        alert('Error al enviar el formulario');
      });
  });

