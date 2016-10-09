$(document).ready ->
  d = $(document)
  loadingOverlay = $('#loading')
  timeout = 250

  $('.button-collapse').sideNav()
  $('.modal-trigger').leanModal()
  $('.scrollspy').scrollSpy()
  $('.select').material_select()
  $('.dropdown-button').dropdown()
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

  $('.datepicker').pickadate()

  # Sidenav
  trigger = $('.hamburger')
  overlay = $('.overlay')
  isClosed = false

  hamburger_cross = ->
    if isClosed == true
      overlay.hide()
      trigger.removeClass 'is-open'
      trigger.addClass 'is-closed'
      isClosed = false
    else
      overlay.show()
      trigger.removeClass 'is-closed'
      trigger.addClass 'is-open'
      isClosed = true
    return

  trigger.click ->
    hamburger_cross()
    return
  $('[data-toggle="offcanvas"]').click ->
    $('#wrapper').toggleClass 'toggled'
    return

  return true
