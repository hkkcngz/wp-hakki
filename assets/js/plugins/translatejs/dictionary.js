var dict = {
    "Welcome!": {
      tr: "Hoşgeldiniz!",
      en: "Welcome!"
    },
    "Literature": {
       tr: "Edebiyat",
       en: "Literature"
    },
    "Music": {
      tr: "Müzik",
      en: "Music"
   },
   "Games": {
      tr: "Oyunlar",
      en: "Games"
    },
    "Software": {
      tr: "Yazılım",
      en: "Software"
    },
}

var translator = $('body').translate({lang: "en", t: dict}); //use English

var en = document.getElementById('translator-en');
var tr = document.getElementById('translator-tr');

en.addEventListener('click', () => {
  translator.lang("en");
});

tr.addEventListener('click', () => {
  translator.lang("tr");
});