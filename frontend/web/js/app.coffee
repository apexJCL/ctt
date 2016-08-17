$(document).ready( ->
  d = $(document)
  loadingOverlay = $('#loading')
  timeout = 250

  $('.button-collapse').sideNav()
  $('.modal-trigger').leanModal()
  $('.scrollspy').scrollSpy()
  $('.select').material_select()
  $('.dropdown-button').dropdown()
  Materialize.updateTextFields()
  try
    document.getElementById('main').scrollIntoView
      block: 'end'
      behavior: 'smooth'
  catch err
  $('.collapsible').collapsible(
    accordion: false
  )

  # Se encarga de mostrar la pantalla de carga antes de enviar la solicitud
  d.on 'pjax:beforeSend', ->
    loadingOverlay.show(timeout)
    return

  # Se encarga de mostrar un mensaje (simple) si sucede un error con la petición
  d.on 'pjax:error', ->
    Materialize.toast 'Ocurrió un error'
    return

  # Se encarga de ocultar la pantalla de carga e iniciarlizar algunos aspectos de Materialize que se ven afectados
  d.on 'pjax:end', ->
    $('.tooltipped').tooltip()
    loadingOverlay.hide(timeout)
    return

  return true
)