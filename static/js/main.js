let center = document.getElementById('center'),
    section = document.getElementById('section'),
    sections_items = document.querySelectorAll('.section_item');
function select_section(){
  console.log(center.value);
  section.innerHTML = "";
  option_ = document.createElement("option");
  option_.text = "----";
  option_.value = "-";
  section.appendChild(option_);
  sections_items.forEach(section_item => {
    let id_center = section_item.dataset.center;
    if(id_center == center.value){
      let value_sction = section_item.dataset.value;
      let name_section = section_item.textContent;
      option = document.createElement("option");
      option.text = name_section;
      option.value = value_sction;
      section.appendChild(option);
    }
  });  
}