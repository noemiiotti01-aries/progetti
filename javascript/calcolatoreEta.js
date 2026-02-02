const bottone = document.getElementById("bottone");
const compleanno = document.getElementById("compleanno");
const risultato = document.getElementById("risultato");

function getAge(valoreCompl) {
  const dataCorrente = new Date();
  const dataCompleanno = new Date(valoreCompl);
  let eta = dataCorrente.getFullYear() - dataCompleanno.getFullYear();
  const mese = dataCorrente.getMonth() - dataCompleanno.getMonth();

  if (
    mese < 0 ||
    (mese === 0 && dataCorrente.getDate() < dataCompleanno.getDate())
  ) {
    eta--;
  }

  return eta;
}

function calcolaEta() {
  const valoreCompl = compleanno.value;
  if (valoreCompl === "") {
    alert("Inserisci il tuo compleanno");
  } else {
    const eta = getAge(valoreCompl);
    risultato.innerText = `Hai ${eta} ${eta > 1 ? "anni" : "anno"}`;
  }
}


bottone.addEventListener("click", calcolaEta);