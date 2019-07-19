$(document).ready(function () {
   toggleFields();
   $("#user_role").change(function () {
      toggleFields();
   });

});

function toggleFields() {
   if ($("#user_role").val() === "4") {
      $("#student").show();
   } else {
      $("#student").hide();
   }
   if ($("#user_role").val() === "3") {
      $("#teacher").show();
   } else {
      $("#teacher").hide();
   }
   if ($("#user_role").val() === "5") {
      $("#professor").show();
   } else {
      $("#professor").hide();
   }
}



// const inputElement = document.querySelector(".js-controlled-input")

// preventDragNDropChangesOn(inputElement)

// function preventDragNDropChangesOn(inputElement) {
//    let previousValue = inputElement.value
//    let isDragged = false
//    let wasDropped = false


//    inputElement.addEventListener('dragstart', () => isDragged = true)
//    document.body.addEventListener('drop', () =>subjects_drag
//       (wasDropped = isDragged) && (previousValue = inputElement.value))
//    inputElement.addEventListener('change', (e) =>
//       isDragged && wasDropped && (e.target.value = previousValue))
//    inputElement.addEventListener('dragend', () => isDragged = wasDropped = false)
// }