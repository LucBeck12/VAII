class Prispevky {
    constructor() {

        setInterval(() => {
            this.getPrispevky("table", "vsetky");
            this.getPrispevky("table2", "moje");
            this.getPrispevky("table1", "pouzivatela");
            this.getOdpovede();
        }, 2000);
        this.getPrispevky(null, "profil");
        this.getPrispevky("table", "vsetky");
        this.getPrispevky("table2", "moje");
        this.getPrispevky("table1", "pouzivatela");

        var button = document.getElementById("odoslatPrispevok");
        button.addEventListener("click", () => {
            var validacia = this.validuj();
            if (validacia) {
                document.getElementById("chybyInput").value = "";
                document.getElementById("odoslatPrispevok").type = "submit";
                this.sendPrispevok();
                document.getElementById("chyby").innerHTML = "";
            }
            ;
        });

        var button2 = document.getElementById("odoslatOdpoved");
        button2.addEventListener("click", () => {
            this.sendOdpoved();
        });
    }

    sendOdpoved() {
        fetch("?c=forum&a=prispevok",
            {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: "odpoved=" + document.getElementById("odpoved").value
            })
            .then(() => {
                document.getElementById("odpoved").value = "";
            });
    }

    sendPrispevok() {
        fetch("?c=forum&a=pridat",
            {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: "nazov=" + document.getElementById("nazov").value + "text="
                    + document.getElementById("text").value
            })
            .then(() => {
                document.getElementById("nazov").value = "";
                document.getElementById("text").value = "";
            });
    }

    getPrispevky(tabulka, ktore) {
        fetch("?c=forum&a=getallprispevky")
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                if (tabulka != null) {
                    var table = document.getElementById(tabulka).getElementsByTagName("tbody")[0];
                    table.innerText = "";
                }
                data.forEach((item) => {
                    if (ktore == "vsetky") {
                        var row = table.insertRow();
                        var idCell = row.insertCell(0);
                        var loginCell = row.insertCell(1);
                        var nazovCell = row.insertCell(2);

                        idCell.innerHTML = item.id;

                        this.linkLogin(item.user, loginCell);
                        this.link(item.name, nazovCell, item.text, idCell.innerHTML);
                        this.buttons(item.user, row, null, item.id, 3, 0);

                    } else if (ktore == "moje") {
                        if (document.getElementById("loggedUser").innerText == item.user) {
                            row = table.insertRow();
                            var idCell = row.insertCell(0);
                            var nazovCell = row.insertCell(1);

                            idCell.innerHTML = item.id;
                            this.link(item.name, nazovCell, item.text, item.id);
                            this.buttons(item.user, row, null, item.id, 2, 0)
                        }
                    } else if (ktore == "pouzivatela") {
                        if (sessionStorage.getItem("login") == item.user) {

                            var row = table.insertRow();
                            var idCell = row.insertCell(0);
                            var nazovCell = row.insertCell(1);

                            idCell.innerHTML = item.id;
                            this.link(item.name, nazovCell, item.text, item.id);
                        }
                    }
                    this.getOdpovede();
                });
                if (ktore == "pouzivatela")
                    document.getElementById("nadpisProfil").innerText = "PRÍSPEVKY POUŽÍVATEĽA " + sessionStorage.getItem("login");
                else if (ktore == "profil") {
                    document.getElementById("nadpisPrispevku").innerHTML = sessionStorage.getItem("nazov");
                    document.getElementById("textPrispevku").innerHTML = sessionStorage.getItem("text");
                    document.getElementById("idPrispevku").value = sessionStorage.getItem("id");
                }
            });
    }

    getOdpovede() {
        /* if (localStorage.getItem('scroll') !== null)
             window.scrollTo(0, sessionStorage.getItem('scroll'));
     sessionStorage.setItem('scroll', window.scrollY);*/

        fetch("?c=forum&a=getallodpovede")
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                var commentSection = document.getElementsByClassName("comment-widgets");
                for (var i = 0; i < commentSection.length; i++)
                    commentSection.item(i).innerHTML = "";
                commentSection.innerHTML = "";
                data.forEach((item) => {
                    if (sessionStorage.getItem("id") == item.name) {
                        var div1 = document.createElement("div");
                        div1.className = "d-flex flex-row comment-row m-t-0";
                        var div2 = document.createElement("div");
                        div2.className = "comment-text w-100";
                        var h6 = document.createElement("h6");
                        h6.className = "font-medium";
                        this.linkLogin(item.user, h6);
                        var span = document.createElement("span");
                        span.className = "m-b-15 d-block";
                        span.innerHTML = item.text;

                        var div3 = document.createElement("div");
                        div3.className = "comment-footer";
                        this.buttons(item.user, null, div3, item.id, null, 1);

                        div2.appendChild(h6);
                        div2.appendChild(span);
                        div2.appendChild(div3);
                        div1.appendChild(div2);
                        commentSection.item(0).appendChild(div1);
                    }
                });
            });

    }

    link(nazov, bunka, text, id) {
        var linkNazov = document.createElement("a");
        if (document.getElementById("loggedUser").innerText != "") {
            linkNazov.href = "?c=forum&a=prispevok";
        } else {
            linkNazov.href = "?c=login";
        }
        linkNazov.id = nazov;
        var linkTextNazov = document.createTextNode(nazov);
        linkNazov.appendChild(linkTextNazov);
        bunka.appendChild(linkNazov);

        linkNazov.onclick = () => {
            sessionStorage.setItem("nazov", linkNazov.id);
            sessionStorage.setItem("text", text);
            sessionStorage.setItem("id", id);
        };
    }

    linkLogin(user, appendTo) {
        var linkLogin = document.createElement("a");
        if (document.getElementById("loggedUser").innerText == user) {
            linkLogin.href = "?c=forum&a=mojprofil";
        } else if (document.getElementById("loggedUser").innerText != "") {
            linkLogin.href = "?c=forum&a=profil";
        } else {
            linkLogin.href = "?c=login";
        }

        linkLogin.id = user;
        var linkTextLogin = document.createTextNode(user);
        linkLogin.appendChild(linkTextLogin);
        appendTo.appendChild(linkLogin);

        linkLogin.onclick = () => {
            sessionStorage.setItem("login", linkLogin.id);
        };
    }

    buttons(user, row, where, id, cell, deleteWhat) {
        if (deleteWhat == 0) {
            var buttonCell = row.insertCell(cell);
            buttonCell.className = "poslednaBunka";
        }
        if (document.getElementById("loggedUser").innerText == user) {
            var button = document.createElement('delete');
            button.type = "button";
            button.className = "btn btn-danger";
            if (deleteWhat == 0)
                button.id = "zmazatPrispevok";
            else
                button.id = "zmazatOdpoved";
            button.innerText = "Zmazať"
            button.onclick = () => {
                if (deleteWhat == 0)
                    location.href = "??c=forum&a=zmaz&id=" + id;
                else
                    location.href = "??c=forum&a=zmazOdpoved&id=" + id;
            };
            if (deleteWhat == 0)
                buttonCell.appendChild(button);
            else
                where.appendChild(button);
        }
    }

    validuj() {
        if (document.getElementById("nazov").value.length < 5 ||
            document.getElementById("nazov").value.length > 50 ||
            document.getElementById("text").value.length < 10) {

            document.getElementById("chyby").innerHTML = "";
            if (document.getElementById("nazov").value.length < 5) {
                document.getElementById("chyby").innerHTML += "Názov príspevku je príliš krátky. Minimálny počet znakov 5." + "<br />";
                document.getElementById("chybyInput").value = "1";
            }
            if (document.getElementById("nazov").value.length > 50) {
                document.getElementById("chyby").innerHTML += "Názov príspevku je príliš dlhý. Maximálny počet znakov 50." + "<br />";
                document.getElementById("chybyInput").value = "1";
            }
            if (document.getElementById("text").value.length < 10) {
                document.getElementById("chyby").innerHTML += "Text príspevku je príliš dlhý. Maximálny počet znakov 10." + "<br />";
                document.getElementById("chybyInput").value = "1";
            }
            return false;
        }
        return true;
        /*if(document.getElementById("nazov").value.length > 5 &&
            document.getElementById("nazov").value.length < 50 &&
            document.getElementById("text").value.length > 10) {
            document.getElementById("chyby").innerHTML = "";
            document.getElementById("chybyInput").innerText = "";
        }*/
    }
}

var prispevky;
window.addEventListener('load', function (event) {
    prispevky = new Prispevky();
});

/*window.addEventListener('scroll', function () {
    sessionStorage.setItem('scroll', window.scrollY);
});

*/

/*getMojePrispevky() {
    fetch("?c=forum&a=getallprispevky")
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            var table = document.getElementById("table2").getElementsByTagName("tbody")[0];
            table.innerText = "";
            data.forEach((item) => {
                if (document.getElementById("loggedUser").innerText == item.user) {
                    var row = table.insertRow();
                    var idCell = row.insertCell(0);
                    var nazovCell = row.insertCell(1);

                    idCell.innerHTML = item.id;
                    this.link(item.name, nazovCell, item.text);
                    this.buttons(item.user, row)
                }
            });
        });
}

getPrispevkyPouzivatela() {
    fetch("?c=forum&a=getallprispevky")
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            var table = document.getElementById("table1").getElementsByTagName("tbody")[0];
            table.innerText = "";
            data.forEach((item) => {
                if (sessionStorage.getItem("login") == item.user) {

                    var row = table.insertRow();
                    var idCell = row.insertCell(0);
                    var nazovCell = row.insertCell(1);

                    idCell.innerHTML = item.id;
                    this.link(item.name, nazovCell, item.text);
                }
            });
            document.getElementById("h2pridat profil").innerText = "Príspevky používateľa " + sessionStorage.getItem("login");
        });
};


getVsetkyPrispevky() {
    this.getPrispevky("table", "vsetky");
}



    getProfilPrispevku() {
        fetch("?c=forum&a=getallprispevky")
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                data.forEach((item) => {
        //if (sessionStorage.getItem("nazov") == item.name && sessionStorage.getItem("text") == item.text) {
        document.getElementById("nazovPrispevku").innerText = "Príspevok " +
            document.getElementById("prispevokNazov").innerText;
        document.getElementById("textPrispevku").innerText =
            document.getElementById("prispevokText").innerText;
        //}
        });
    });
    }
    */