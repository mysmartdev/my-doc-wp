
# README

Dieses Dokument beschreibt die Nutzung des My-Doc WordPress plugins. 

## Inhaltsverzeichniss

- [README](#readme)
  * [Installation](#installation)
  * [Konfiguration](#konfiguration)
  * [Shortcodes](#shortcodes)
    + [Öffnungszeiten](#-ffnungszeiten)
    + [Formulare](#formulare)
    + [News](#news)
    + [Kontaktdaten](#kontaktdaten)
    + [Bilder](#bilder)

## Installation

Die Installation des My-Doc WordPress Plugin ist einfach. Das Plugin muss heruntergeladen und auf dem Computer abgespeichert werden. 
Anschließend meldet man sich als Administrator auf seiner WordPress Seite an. Auf der linken Seite befindet sich im Menü der Eintrag "Plugins". 
Fährt man mit der Maus über diesen, ist ein Punkt "Installieren" zu sehen. Dort findet man eine Auswahl an verschiedenen Plugins. Am oberen Seitenrand
befindet sich eine Schaltfläche "Plugin hochladen". Nun muss das Plugin ausgewählt werden. Mit einem Klick auf "Jetzt installieren" wird das Plugin 
installiert. Anschließend kann man es aktivieren.

## Konfiguration

Die Konfiguration des Plugins erfolgt über den Auswahlpunkt "My-Doc Konfiguration" im WordPress Adminbereich. Dort muss zu allererst der API Schlüssel,
welchen Sie von My-Doc bekommen haben, eingetragen werden. Sollten Sie diesen vergessen haben können Sie sich gerne bei My-Doc melden.

## Shortcodes

Die My-Doc WordPress API funktioniert mithilfe von Shortcodes. Diese müssen lediglich an die gewünschten Stellen der WordPress Seite hinterlegt werden,
an welchen der entsprechende Content angezeigt werden soll. In der Webseitendarstellung werden diese dann ersetzt.

Im folgenden eine Liste an nutzbaren Shortcodes:

### Öffnungszeiten

Hier sehen Sie alle Shortcodes zur Darstellung von Öffnungszeiten. Diese Öffnungszeiten werden in Tabellen dargestellt.

|Beschreibung		|Shortcode						|
|-------------------|-------------------------------|
|Öffnungszeiten		|[wp_mydoc_oeffnungszeiten]		|
|Bereitschaftszeiten|[wp_mydoc_bereitschaftszeiten]	|
|Abwesenheitszeiten	|[wp_mydoc_abwesenheitszeiten]	|

### Formulare

Sollten Sie Formulare hinterlegt haben, können Sie diese mit folgenden Shortcodes anzeigen.

|Beschreibung		|Shortcode						|
|-------------------|-------------------------------|
|Alle Formulare anzeigen|[wp_mydoc_formulare]		|
|Bestimmtes Formular anzeigen|[wp_mydoc_bereitschaftszeiten]	|

### News

Auch Ihre News können angezeigt werden.

|Beschreibung|Shortcode|
|--|--|
|Alle News anzeigen||
|Bestimmte News anzeigen||

### Kontaktdaten - Persönlich

|Beschreibung|Shortcode|
|--|--|
|Vorname|[wp_mydoc_kontaktdaten_vorname]|
|Nachname|[wp_mydoc_kontaktdaten_nachname]|
|Titel|[wp_mydoc_kontaktdaten_titel]|
|Webseite|[wp_mydoc_kontaktdaten_webseite]|
|Telefon|[wp_mydoc_kontaktdaten_telefon]|
|Handy|[wp_mydoc_kontaktdaten_handy]|
|E-Mail|[wp_mydoc_kontaktdaten_email]|
|Kategorie|[wp_mydoc_kontaktdaten_kategorie]|

### Kontaktdaten - Praxis

|Praxisname|[wp_mydoc_kontaktdaten_praxis_name]|
|Telefon|[]|
|Straße|[wp_mydoc_kontaktdaten_praxis_straße]|
|PLZ|[wp_mydoc_kontaktdaten_praxis_plz]|
|Stadt|[wp_mydoc_kontaktdaten_praxis_stadt]|
|Bundesland|[wp_mydoc_kontaktdaten_praxis_bundesland]|


### Bilder

|Beschreibung|Shortcode|
|--|--|
|Logo||
|Banner||