# WordPress Speed Booster – PrimePixel

Plugin WordPress leggero (< 5KB) per ottenere **PageSpeed 90+** senza plugin pesanti. Realizzato da **Prime Pixel – Web Agency a Nerviano (MI)**.

🌐 **Sito Ufficiale:** https://www.primepixel.it  
📍 **Web Agency Nerviano - Milano:** Via Sant'Anna 26, 20014 Nerviano (MI)  
📧 info@primepixel.it

### 🚀 Cosa fa (in 1 plugin, 0 configurazione)

- ❌ Rimuove Emoji script (1 richiesta HTTP in meno)
- 🧹 Rimuove `?ver=` da CSS/JS per cache migliore
- 💓 Disattiva WordPress Heartbeat su frontend
- ⏩ Aggiunge `defer` automatico ai JS non critici
- 🔗 Preconnect a fonts.gstatic.com
- 🖼️ Lazy-load nativo per immagini

Risultato medio testato: **+15/25 punti su PageSpeed Mobile** su siti WordPress standard.

### 📦 Installazione

1. Scarica lo zip di questo repo
2. WordPress > Plugin > Aggiungi nuovo > Carica plugin
3. Attiva. Fine. Nessuna impostazione.

### 🛠️ Per sviluppatori

```php
// Esclude un handle dal defer
add_filter('pp_booster_defer_exclude', function($handles){
    $handles[] = 'my-script';
    return $handles;
});
```

### 📈 Perché Prime Pixel?

Siamo una **web agency specializzata in siti WordPress veloci e SEO-oriented per PMI in Lombardia**. Questo plugin è quello che usiamo di base su tutti i progetti clienti a Nerviano e Milano.

> Cerchi un sito veloce che porta clienti? Scopri i nostri servizi su [primepixel.it/servizi/siti-web-wordpress-veloci](https://www.primepixel.it)

### Licenza

MIT – Usalo liberamente, anche per clienti. Se ti è utile lascia una ⭐ su GitHub.

---
*Keywords: wordpress speed optimization, pagespeed 90, wordpress performance plugin, web agency Nerviano, web agency Milano*
