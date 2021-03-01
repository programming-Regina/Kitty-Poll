var votos = [["Fabrizio", 0], ["Lady Maffia", 0], ["Moustache", 0], ["Favio", 0], ["Mrs. Meow", 0]]

const btn = document.querySelector('#vote');
// handle click button
btn.onclick = function () {
    const rbs = document.querySelectorAll('input[name="customRadio"]');
    let selectedValue;
    for (const rb of rbs) {
        if (rb.checked) {
            selectedValue = rb.value;
            votos[selectedValue-1][1]++;
            alert(votos[selectedValue-1][0] + " agradece tu voto.");
            break;
        }
    }
  };

