---
title: Changelog
---

## 4.1.0.0 - (2020-07-28)
### Added
- Update für OXID 6.2 (vielen Dank an Marten Seemann)
### Changed
- Dokumentationsformat aktualisiert

---

## 4.0.0.2
### Changed
- Installation via Composer ermöglicht
### Fixed
- Hotfix für Google Chrome Browser, vermeidet unnötigen Leerraum vor den Settings im Admin

---

## 4.0.0.1
### Fixed
- "weiße" Thankyou-Seite behoben
- 0007740: ecomm_totalvalue: [{$sD3GARemarketingPrice}] - als Standardwert wird nun 0 übergeben, damit ecomm_totalvalue nicht leer bleibt und dadurch Syntaxfehler verursacht
- 0007832: fehlende Angabe der Währung

---

## 4.0.0.0
### Changed
- Oxid V6 Release
### Fixed
- 0006419: Korrektur der Benamung der Eingabefelder für Remarketing

**Minor version upgrade notice: there are some backward-incompatible changes to this release.**

---

## 3.4.0.0
### Changed
- Remarketing (via Analytics) eingefügt
- Remarketing-Liste für Startseite eingefügt
- Template-Blöcke eingefügt
- Titel der Konfigurationsseiten angepasst
- Scriptsyntax angepasst
### Fixed
- Staffelpreisübergaben korrigiert (0003679)
- Steuerberechnung korrigiert


## 3.4.0.1
### Changed
- 0005078: ecomm_totalvalue darf nicht in Apostrophen stehen
- 0004814: Remarketing: Werte für ecomm_pagetype anpassen
- 0004509: changed_full entfernen
- AdBlock-Checker in Admin integriert, da dieser die Darstellung des Adminbereichs blockieren kann


## 3.3.2.0
- fix: Optionen im Admin können nicht deaktivert werden
       - "Zertifizierter Händler" im Shop aktivieren
       - zusätzliche Daten aus Google Shopping übertragen
- fix: 
- fix: 
- Link "Hilfe starten" korrigieren
- Aktualisierung der Modulinstallationsanleitung / Vorabprüfung (d3precheck)
- freigegeben bis PHP 5.6

### Fixed
- Zertifizierte Händler, "locale" Eintrag auch ohne aktive Option "zusätzliche Daten aus Google Shopping übertragen"
- Kampagnencode wurde nicht übertragen

## 3.3.1.0
- Lieferzeitangabe kann nun für lagernde und nicht lagernde Artikel getrennt angegeben werden
- Domainliste bei Verwendung mehrerer Shop-Domains korrigiert
- Schalter für Absprungratenermittlung integriert
- "Zertifizierte Händler"-Variablen werden nur gezeigt, wenn "Zertifizierter Händler" aktiv ist
- JS-Fehler bei unkonfigurierter Absprung-Zeit korrigiert


## 3.3.0.1
- Kompatibilität zu Egate Media PayPal verbessert


## 3.3.0.0
- Google Zertifizierte Händler eingefügt
- Hilfetexte erweitert
- Integration ins Mobile-Theme
- Optimierung der Transaktionsübergaben
- getrackte Absprungrate optimiert
- Konfigurationsvariablen korrigiert
- Fehler bei "toBasket" auf Detailseite ohne Kategorieangabe korrigiert


## 3.2.1.0
- neue Option "Opt Out anzeigen lassen"


## 3.2.0.0
- Tracking für gekaufte Artikel enthält Daten zur Kategorie / Seite, aus der die Artikel zuerst in den Warenkorb gelegt wurden
- Bugfix: Artikeltitel werden escaped, sofern Quotes enthalten sind
- AutoLinker-URL enthält auch abweichende SSL-URLs


## 3.1.0.2
- Bugfix: deaktiviertes Modul kann benötigtes Objekt nicht laden
- Bugfix: Seiten ohne Klassenangaben (z.B. 404-Seiten) versuchen Artikellisten für Remarketing zu laden


## 3.1.0.1
- Universal-Trackingcode für Multi-Domain-Nutzung angepasst


## 3.1.0.0
- Universal-Analytics Tracking-Code implementiert
- zusätzliche Steuerungsparameter eingefügt
- Trichtererfassung vereinfacht
- konfigurierbarerer AdWords Conversion-Trackingcode integriert
- Remarketing-Tags integriert


## 3.0.0.3
- Precheck angepasst
- Templates für 4.8.0 / 5.1.0 hinzugefügt


## 3.0.0.2
- automatische Installation angepasst


## 3.0.0.1
- Umstellung auf teilautomatische Installation
- Übergabe der Steuer


## 3.0.0.0
- Umstellung auf Struktur des OXID 4.7 / 5.0
- benutzerdefinierte Variablen um "Neukunde" ergänzt
- Trackingcode in <head> verschoben
- optionales Logging integriert


## 2.4.1
- Templates für OXID 4.6.4 kompatibel


## 2.4.0
- Remarketing-Option eingefügt
- Metadaten vervollständigt
- Syntaxfehler im JS-Code entfernt


## 2.3.0
- Templates für OXID 4.5.11 und 4.6.2 kompatibel
- weitere Beispiele für benutzerdefinierte Variablen eingefügt


## 2.2.2
- Templates für OXID 4.6 eingefügt
- Metadaten eingefügt
- Templates für OXID 4.5.9 kompatibel


## 2.2.1
- Templates für OXID 4.5.3 bis 4.5.6 kompatibel
- Syntaxfehler im JS-Code entfernt


## 2.2.0

#### Changed
- Kampagnen können unabhängig von deren Code deaktiviert werden
- Ladezeit-Log hinzugefügt
- Preise werden in Shophauptwährung übertragen
- Templates für OXID 4.5.1 kompatibel
