//envoie les infos à la modale bootstrap permettant d'afficher les détails de l'article
$('#articlesModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var articleTitle = button.data('title'); // Extract info from data-* attributes
    var articleDesc = button.data('desc');
    var artLink = button.data('link');
    var artImg = button.data('img');
    var artDate = button.data('date');
    var catColor = button.data('catcolor');
    var classCatColor = 'bg-' + catColor;
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find('.modal-title').text(articleTitle);
    modal.find('.modal-body div img').attr('src', artImg);
    modal.find('.modal-body #desc').text(articleDesc);
    modal.find('.modal-body p').text(artDate);
    modal.find('.modal-footer #articleLink').attr('href', artLink);
    $('#articleModalHeader').removeClass('bg-primary bg-success bg-danger bg-warning bg-info');
    $('#articleModalFooter').removeClass('bg-primary bg-success bg-danger bg-warning bg-info');
    $('#articleModalHeader').addClass(classCatColor);
    $('#articleModalFooter').addClass(classCatColor);
  })