$(document).ready(function() {
	
	  $("#telefone").inputmask({
		mask: ["(99) 9999-9999", "(99) 9999-9999", ],
		keepStatic: true
	  });
	});

	$(document).ready(function() {
	  $("#celular").inputmask({
		mask: ["(99) 9999-9999", "(99) 9-9999-9999", ],
		keepStatic: true
	  });
});