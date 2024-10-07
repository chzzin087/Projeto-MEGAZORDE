function classToggle() {
  const navs = document.querySelectorAll('.side_items')
  
  navs.forEach(nav => nav.classList.toggle('sidebar_exibir'));
}

function handleClickOutside(event) {
  const navs = document.querySelectorAll('.side_items');
  const menuSand = document.querySelector('.menu_sand');

  // Verifica se o clique foi fora do menu e do botão de alternância
  if (!Array.from(navs).some(nav => nav.contains(event.target)) && !menuSand.contains(event.target)) {
      navs.forEach(nav => nav.classList.remove('sidebar_exibir'));
  }
}

document.querySelector('.menu_sand').addEventListener('click', classToggle);
document.addEventListener('click', handleClickOutside);

const calendario = document.querySelector('.calendario'),
    date = document.querySelector('.data'),
    daysContainer = document.querySelector('.dias'),
    prev = document.querySelector('.prev'),
    next = document.querySelector('.next'),
    todayBtn = document.querySelector('.today-btn'),
    gotoBtn = document.querySelector('.goto-btn'),
    dateInput = document.querySelector('.date-input');

let today = new Date();
let activeDay;
let month = today.getMonth();
let year = today.getFullYear();

const months = [
    "Janeiro",
    "Fevereiro",
    "Março",
    "Abril",
    "Maio",
    "Junho",
    "Julho",
    "Agosto",
    "Setembro",
    "Outubro",
    "Novembro",
    "Dezembro",
];

//funcao de adicionar dias

function initCalendar() {
    //para pegar os dias do mes passado, todos os dias do mes atual e os dias do mes seguinte
    const firstDay = new Date(year, month, 1);
    const lastDay = new Date(year, month + 1, 0);
    const prevLastDay = new Date(year, month, 0);
    const prevDays = prevLastDay.getDate();
    const lastDate = lastDay.getDate();
    const day = firstDay.getDay();
    const nextDays = 7 - lastDay.getDay() - 1;

    //atualizar data em cima do calendário
    date.innerHTML = months[month] + " " + year ;

    //adicionando dias com DOM
    let days = "";

    //dias do mes anterior
    for(let x = day; x > 0; x--){
        days += `<div class = "dia mes-ant">${prevDays - x + 1}</div>`;
    }

    //dias do mes atual

    for(let i = 1; i <= lastDate; i++){
        //se o dia for hoje, adicionar classe hoje
        if (
        i === new Date().getDate() && 
        year === new Date().getFullYear() &&
        month === new Date().getMonth()
        ) {
            days += `<div class = "dia hoje">${i}</div>`;
          }
          //adicionar dias restantes
          else{
            days += `<div class = "dia ">${i}</div>`;
          }
          
    }
    //dias do proximo mes
    for (let j = 1; j <= nextDays; j++){
        days += `<div class = "dia prox-mes">${j}</div>`;
    }

    daysContainer.innerHTML = days;
}

initCalendar();

//mes passado

function prevMonth(){
    month--;
    if(month < 0){
        month = 11;
        year--;
    }
    initCalendar();
}

//proximo mes

function nextMonth(){
    month++;
    if(month > 11){
        month = 0;
        year++;
    }
    initCalendar();
}

//adicionar eventlistener no proximo e anterior

prev.addEventListener("click", prevMonth);
next.addEventListener("click", nextMonth);

//configuracao do goto

todayBtn.addEventListener("click", () => {
    today = new Date();
    month = today.getMonth();
    year = today.getFullYear();
    initCalendar();
});

dateInput.addEventListener("input", (e) =>{
    // Permitir que somente números sejam adicionados
    dateInput.value = dateInput.value.replace(/[^0-9]/g, "");

    // Adicionar a barra (/) após os dois primeiros dígitos (mês)
    if (dateInput.value.length > 2) {
        dateInput.value = dateInput.value.slice(0, 2) + "/" + dateInput.value.slice(2);
    }

    // Limitar a 7 caracteres (MM/YYYY)
    if (dateInput.value.length > 7) {
        dateInput.value = dateInput.value.slice(0, 7);
    }

    // Se o usuário deletar, ajustar a formatação
    if (e.inputType === "deleteContentBackward") {
        if (dateInput.value.length === 3) {
            dateInput.value = dateInput.value.slice(0, 2);
        }
    }
});

function gotoDate() {
    const dateArr = dateInput.value.split("/");
    console.log(dateArr);
    //validação de dados
    if (dateArr.length === 2){
        if(dateArr[0] > 0 && dateArr[0] < 13 && dateArr[1].length === 4){
            month = dateArr[0] - 1;
            year = dateArr[1];
            initCalendar();
            return;
        }
    }
    //se a data for invalida
    alert("Data inválida! Tente novamente.");
}
gotoBtn.addEventListener("click", gotoDate);

var reservaBtn = document.querySelector(".botao-reserva")
var fecharBtn = document.querySelector(".close")
var dialogReserva = document.querySelector(".add-reserva")

reservaBtn.addEventListener("click", function (){
    dialogReserva.showModal()
})
fecharBtn.addEventListener("click", function (){
    dialogReserva.close()
})
