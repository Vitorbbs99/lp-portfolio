// Lazy load
window.lazySizesConfig = window.lazySizesConfig || {};
lazySizesConfig.loadMode = 1;

// URL Base
const url_base = $("#infos").data("url-base");

// DEBOUNCE (Melhora a performance de funções repetitivas como "Scroll / Resize")
const debounce = function (n, t, u) {
  var e;
  return function () {
    var a = this,
      i = arguments,
      o = function () {
        (e = null), u || n.apply(a, i);
      },
      r = u && !e;
    clearTimeout(e), (e = setTimeout(o, t)), r && n.apply(a, i);
  };
};

// Verifica se o tamanho da tela é menor do que o tamanho passado (Útil em caso de verificação de responsividade)
function isMobileX(screenSize) {
  return $(window).width() < screenSize;
}

// Verifica o tamanho da tela de acordo com o tipo passado
function isMedia(media) {
  media = media.trim().toLowerCase();
  const size = $(window).width();
  /* const validations = {
    xs: size <= 480,
    sm: size > 480 && size <= 768,
    md: size > 768 && size <= 945,
    lg: size > 940 && size <= 1280,
    xl: size > 1280,
  }; */
  const validations = {
    mobile: size <= 768,
    tablet: size > 768 && size < 1200,
    desktop: size > 1200,
  };
  return validations[media];
}

// Formata um valor para real (R$)
function formatMoneyBR(v, c, d, t) {
  var n = v,
    c = isNaN((c = Math.abs(c))) ? 2 : c,
    d = d == undefined ? "," : d,
    t = t == undefined ? "." : t,
    s = n < 0 ? "-" : "",
    i = parseInt((n = Math.abs(+n || 0).toFixed(c))) + "",
    j = (j = i.length) > 3 ? j % 3 : 0;
  return (
    s +
    (j ? i.substr(0, j) + t : "") +
    i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) +
    (c
      ? d +
        Math.abs(n - i)
          .toFixed(c)
          .slice(2)
      : "")
  );
}

// Formata um valor em real (R$) para o formato do banco
function formatMoneyBD(value) {
  return value.replace(".", "").replace(",", ".");
}

// Copia uma string para a área de transferência
function copyToClipboard(str) {
  const el = document.createElement("textarea");
  el.value = str;
  el.setAttribute("readonly", "");
  el.style.position = "absolute";
  el.style.left = "-9999px";
  document.body.appendChild(el);
  const selected =
    document.getSelection().rangeCount > 0
      ? document.getSelection().getRangeAt(0)
      : false;
  el.select();
  document.execCommand("copy");
  document.body.removeChild(el);
  if (selected) {
    document.getSelection().removeAllRanges();
    document.getSelection().addRange(selected);
  }
}

// Gera um slug
function slugify(text) {
  return text
    .toString()
    .normalize("NFD")
    .replace(/[\u0300-\u036f]/g, "")
    .toLowerCase()
    .trim()
    .replace(/\s+/g, "-")
    .replace(/[^\w-]+/g, "")
    .replace(/--+/g, "-");
}

// Executa uma função após um script ser carregado
function loadScript(url, callback) {
  var script = document.createElement("script");
  script.type = "text/javascript";
  if (script.readyState) {
    // only required for IE <9
    script.onreadystatechange = function () {
      if (script.readyState === "loaded" || script.readyState === "complete") {
        script.onreadystatechange = null;
        callback();
      }
    };
  } else {
    //Others
    script.onload = function () {
      callback();
    };
  }
  script.src = url;
  if (document.querySelector("#external-js")) {
    document.getElementById("external-js").appendChild(script);
  } else {
    document.body.appendChild(script);
  }
}

// Retorna a data atual por extenso
function getCurDateExt(date = null) {
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
  const dayWeeks = [
    "Domingo",
    "Segunda-feira",
    "Terça-feira",
    "Quarta-feira",
    "Quinta-feira",
    "Sexta-feira",
    "Sábado",
  ];
  const cd = date === null ? new Date() : date;
  const day = cd.getDate() >= 10 ? cd.getDate() : "0" + cd.getDate();
  return (
    dayWeeks[cd.getDay()] +
    ", " +
    day +
    " de " +
    months[cd.getMonth()] +
    " de " +
    cd.getFullYear()
  );
}

// Adiciona dias a uma data
function addDays(date, days, format = false) {
  let dateObj;
  if (typeof date === "string") {
    const parts = date.split("/");
    dateObj = new Date(parts[2], parts[0] - 1, parts[1]);
  } else if (date instanceof Date) {
    dateObj = new Date(date);
  } else {
    throw new Error("Data inválida.");
  }
  dateObj.setDate(dateObj.getDate() + days);
  if (format) {
    return dateObj.toLocaleDateString("pt-BR");
  }
  return dateObj;
}

// Subtrai dias a uma data
function subDays(date, days, format = false) {
  let dateObj;
  if (typeof date === "string") {
    const parts = date.split("/");
    dateObj = new Date(parts[2], parts[0] - 1, parts[1]);
  } else if (date instanceof Date) {
    dateObj = new Date(date);
  } else {
    throw new Error("Data inválida.");
  }
  dateObj.setDate(dateObj.getDate() - days);
  if (format) {
    return dateObj.toLocaleDateString("pt-BR");
  }
  return dateObj;
}

// Calcula a diferença entre duas datas
function diffDates(date1, date2, unit = "days") {
  let dateObj1, dateObj2;
  if (typeof date1 === "string") {
    const parts1 = date1.split("/");
    dateObj1 = new Date(parts1[2], parts1[1] - 1, parts1[0]);
  } else if (date1 instanceof Date) {
    dateObj1 = new Date(date1);
  } else {
    throw new Error(
      'Invalid format for date1. Please use a string in the format "DD/MM/YYYY" or a date object.'
    );
  }
  if (typeof date2 === "string") {
    const parts2 = date2.split("/");
    dateObj2 = new Date(parts2[2], parts2[1] - 1, parts2[0]);
  } else if (date2 instanceof Date) {
    dateObj2 = new Date(date2);
  } else {
    throw new Error(
      'Invalid format for date2. Please use a string in the format "DD/MM/YYYY" or a date object.'
    );
  }
  const diff = Math.abs(dateObj2 - dateObj1);
  if (unit === "hours") {
    return Math.round(diff / (1000 * 60 * 60));
  } else if (unit === "days") {
    return Math.round(diff / (1000 * 60 * 60 * 24));
  } else {
    throw new Error('Invalid unit. Please specify "hours" or "days".');
  }
}

// Substituição de variáveis nas páginas
(function () {
  "use strict";

  // Variáveis a substituir
  const replacesVars = window.LPQV_VARS_RPL || {};
  replacesVars["{{cidade}}"] = "";
  replacesVars["{{uf}}"] = "";
  replacesVars["{{estado}}"] = "";
  replacesVars["{{pais}}"] = "";
  replacesVars["{{pais-sigla}}"] = "";
  replacesVars["{{hoje}}"] = formataDataExt(new Date(), "{d}/{m}/{Y}");
  replacesVars["{{hoje-ext}}"] = getCurDateExt();
  replacesVars["{{amanha}}"] = formataDataExt(
    addDays(new Date(), 1),
    "{d}/{m}/{Y}"
  );
  replacesVars["{{amanha-ext}}"] = getCurDateExt(addDays(new Date(), 1));
  replacesVars["{{ano}}"] = formataDataExt(new Date(), "{Y}");
  replacesVars["{{ano-ab}}"] = formataDataExt(new Date(), "{y}");
  replacesVars["{{mes}}"] = formataDataExt(new Date(), "{m}");
  replacesVars["{{mes-ext}}"] = formataDataExt(new Date(), "{F}");
  replacesVars["{{dia}}"] = formataDataExt(new Date(), "{d}");
  replacesVars["{{dia-semana}}"] = formataDataExt(new Date(), "{l}");
  replacesVars["{{dia-semana-ab}}"] = formataDataExt(new Date(), "{D}");
  replacesVars["{{horario}}"] = formataDataExt(new Date(), "{H}:{i}");
  replacesVars["{{hora}}"] = formataDataExt(new Date(), "{H}");
  replacesVars["{{minuto}}"] = formataDataExt(new Date(), "{i}");
  replacesVars["{{rand-1-10}}"] = randomNumber(1, 10);
  replacesVars["{{rand-10-100}}"] = randomNumber(10, 100);
  replacesVars["{{rand-100-1000}}"] = randomNumber(100, 1000);
  replacesVars["{{rand-1000-10000}}"] = randomNumber(1000, 10000);
  replacesVars["{{url_base}}"] = url_base;
  replacesVars["{{url_base_clean}}"] = location.hostname
    .replace("http://", "")
    .replace("https://", "")
    .replace("www.", "")
    .replace(/\/$/, "");

  // Encontra os elementos com o padrão
  const elsReplace = [];

  function initReplaceVars() {
    let selectorEl = [];
    Object.keys(replacesVars).forEach(function (rplVar) {
      selectorEl.push(":contains('" + rplVar + "')");
    });
    selectorEl = selectorEl.join(",");
    $(selectorEl).each(function () {
      const textNodes = $(this)
        .contents()
        .filter(function () {
          if (this.nodeType === 3) {
            for (let varVerify of Object.keys(replacesVars)) {
              if (this.nodeValue.indexOf(varVerify) !== -1) {
                return true;
              }
            }
          }
        });
      const elParent = textNodes.parent();
      if (elParent[0] && !elsReplace.includes(elParent[0])) {
        elsReplace.push(elParent[0]);
      }
    });
    if (elsReplace.length > 0) {
      loadingReplaces();
      /* getGeoLocation(function (geoIp) {
        if (geoIp) {
          replacesVars["{{cidade}}"] = geoIp?.city || "";
          replacesVars["{{uf}}"] = geoIp?.region || "";
          replacesVars["{{estado}}"] = geoIp?.regionName || "";
          replacesVars["{{pais}}"] = geoIp?.country || "";
          replacesVars["{{pais-sigla}}"] = geoIp?.countryCode || "";
        }
        showReplaces();
      }); */
    }
    showReplaces();
  }
  initReplaceVars();
  $("body").on("replace-vars", initReplaceVars);

  // Oculta os elementos enquanto os dados são carregados
  function loadingReplaces() {
    elsReplace.forEach(function (el) {
      el.style.opacity = "0";
    });
  }

  // Substitui as variáveis
  function showReplaces() {
    elsReplace.forEach(function (el) {
      let elText = el.innerHTML;
      let elNewText = elText;
      Object.keys(replacesVars).forEach(function (rK) {
        if (replacesVars[rK]) {
          const regexRpl = new RegExp("\\" + rK + "", "g");
          elNewText = elNewText.replace(regexRpl, replacesVars[rK]);
        }
      });
      el.innerHTML = elNewText;
      el.style.opacity = "1";
    });
  }
})();

// Obtém um parâmetro da url
function getUrlParam(param) {
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  return urlParams.get(param);
}

// Cria/Atualiza um cookie
function setCookie(cName, cValue, expDays) {
  let date = new Date();
  date.setTime(date.getTime() + expDays * 24 * 60 * 60 * 1000);
  const expires = "expires=" + date.toUTCString();
  document.cookie = cName + "=" + cValue + "; " + expires + "; path=/";
}

// Obtém um cookie
function getCookie(cName) {
  const name = cName + "=";
  const cDecoded = decodeURIComponent(document.cookie);
  const cArr = cDecoded.split("; ");
  let res;
  cArr.forEach((val) => {
    if (val.indexOf(name) === 0) res = val.substring(name.length);
  });
  return res;
}

// Gera um número aleatório
function randomNumber(min, max) {
  return Math.floor(Math.random() * (max - min + 1) + min);
}

// Retorna uma data em um formato específico
function formataDataExt(data, formato = "{d}/{m}/{Y}") {
  let retorno = formato;
  const time = new Date(data);
  if (isNaN(time)) {
    return false;
  }
  const meses = {
    "01": "Janeiro",
    "02": "Fevereiro",
    "03": "Março",
    "04": "Abril",
    "05": "Maio",
    "06": "Junho",
    "07": "Julho",
    "08": "Agosto",
    "09": "Setembro",
    10: "Outubro",
    11: "Novembro",
    12: "Dezembro",
  };
  const diasSemana = [
    "Domingo",
    "Segunda-feira",
    "Terça-feira",
    "Quarta-feira",
    "Quinta-feira",
    "Sexta-feira",
    "Sábado",
  ];
  const siglas = {
    // Dia do mês com zero à esquerda
    d: String(time.getDate()).padStart(2, "0"),
    // Dia da semana abreviado (3 letras)
    D: diasSemana[time.getDay()].substr(0, 3),
    // Dia do mês sem zero à esquerda
    j: time.getDate(),
    // Dia da semana completo
    l: diasSemana[time.getDay()],
    // Mês completo
    F: meses[String(time.getMonth() + 1).padStart(2, "0")],
    // Mês com zero à esquerda
    m: String(time.getMonth() + 1).padStart(2, "0"),
    // Mês abreviado (3 letras)
    M: meses[String(time.getMonth() + 1).padStart(2, "0")].substr(0, 3),
    // Ano completo (4 dígitos)
    Y: time.getFullYear(),
    // Ano abreviado (2 dígitos)
    y: String(time.getFullYear()).slice(-2),
    // Horas (Formato 24h)
    H: String(time.getHours()).padStart(2, "0"),
    // Minutos
    i: String(time.getMinutes()).padStart(2, "0"),
    // Segundos
    s: String(time.getSeconds()).padStart(2, "0"),
  };
  for (const sigla in siglas) {
    if (siglas.hasOwnProperty(sigla)) {
      retorno = retorno.replace("{" + sigla + "}", siglas[sigla]);
    }
  }
  return retorno;
}

// Ajusta a altura do conteúdo da página
$(function () {
  if ($(".pag-height-fix").length) {
    const $content = $(".pag-height-fix");
    let elsHeight = 0;
    $(".header, .pag-banner, .footer").each(function () {
      const $el = $(this);
      elsHeight += $el.outerHeight();
    });
    let heightFix = $(window).height() - elsHeight;
    $content.css("min-height", heightFix);
    $content.addClass("loaded");
  }
});

$(function () {
  $(".faq-pergunta").on("click", function () {
    $(this).next(".faq-resposta").slideToggle();
    $(this).parent(".faq").toggleClass("open");
  });
});
