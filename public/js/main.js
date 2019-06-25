$(document).ready(function () {
    toggleFields();
    $("#user_role").change(function () {
        toggleFields();
    });

});

function toggleFields() {
    if ($("#user_role").val() === "4")
        $("#otherServer").show();
    else
        $("#otherServer").hide();
}



const inputElement = document.querySelector(".js-controlled-input")

preventDragNDropChangesOn(inputElement)

function preventDragNDropChangesOn(inputElement) {
  let previousValue = inputElement.value
  let isDragged = false
  let wasDropped = false
  
  /*
  * event order:
  *   dragstart (prepare for possible text cutting)
  *   drop (input text was not cut out yet at this point, so we can save it to revert it later)
  *   change (input text is already cut out at this point - revert it to the previous value)
  *   dragend (revert variables to initial state)
  */
  
  inputElement.addEventListener('dragstart', () => isDragged = true)
  document.body.addEventListener('drop', () =>
    (wasDropped = isDragged) && (previousValue = inputElement.value))
  inputElement.addEventListener('change', (e) =>
    isDragged && wasDropped && (e.target.value = previousValue))
  inputElement.addEventListener('dragend', () => isDragged = wasDropped = false)
}


