const SHOP="https://shopee.co.id/animolabel";
const P="assets/produk/";
const IMG={
 thermal:"assets/produk/produk-label-thermal-01 (7).jpg",
 thermal33x15:"assets/produk/label thermal 33x15mm.jpg",
 thermal33x19:"assets/produk/produk-label-thermal-01 (7).jpg",
 semicoated:"assets/produk/label semicoated warna.jpg",
 semicoated2:"assets/produk/label semicoated 2 line.jpg",
 roundColor:"assets/produk/Stiker Bulat Warna.jpg",
 roundNumber:"assets/produk/Stiker Bulat Angka.jpg",
 roundArrow:"assets/produk/Stiker Bulat Panah.jpg",
 roundSize:"assets/produk/Stiker Bulat Size.jpg",
 blackmark:"assets/produk/Label blackmark.jpg",
 arrow:"assets/produk/stiker panah 1cm.jpg",
 ribbon:"assets/produk/ribbon barcode full resin 110x300.jpg"
};
const ANIMO_CATALOG=[
{id:1,cat:"Label Thermal",name:"LABEL THERMAL 70 X 50 MM — ISI 1.000 PCS",desc:"Direct Thermal untuk barcode dan kebutuhan label harian.",price:"Rp27.040–Rp55.000",img:IMG.thermal,url:"https://shopee.co.id/LABEL-THERMAL-70X50-1.000-Pcs-BARCODE-Thermal-70-X-50-MM-70-mm-X-50-mm-7-x-5-cm-ISI-1000-PCS-i.708541841.24527185171"},
{id:2,cat:"Label Thermal",name:"LABEL THERMAL 80 X 50 MM — ISI 1.000 PCS",desc:"Stiker thermal 8 × 5 cm untuk printer barcode.",price:"Rp28.500–Rp58.200",img:IMG.thermal,url:SHOP},
{id:3,cat:"Label Thermal",name:"LABEL THERMAL 65 X 40 MM — ISI 1.000 PCS",desc:"Direct Thermal 65 × 40 mm.",price:"Rp40.000",img:IMG.thermal,url:"https://shopee.co.id/LABEL-THERMAL-65-X-40-isi-1000-PCS-Direct-Thermal-65X40-MM-Label-Barcode-Thermal-65X40-MM-ISI-1.000-PCS-i.708541841.50703401473"},
{id:4,cat:"Label Thermal",name:"LABEL THERMAL 50 X 60 MM — ISI 1.000 PCS",desc:"Direct Thermal 5 × 6 cm.",price:"Rp23.000–Rp81.000",img:IMG.thermal,url:"https://shopee.co.id/LABEL-THERMAL-50X60-BARCODE-Thermal-50-X-60-MM-Direct-Thermal-50-X-60-mm-Stiker-Thermal-5-x-6-cm-ISI-1000-PCS-i.708541841.25180010774"},
{id:5,cat:"Label Thermal",name:"LABEL THERMAL 80 X 40 MM — ISI 1.000 PCS",desc:"Direct Thermal 8 × 4 cm untuk barcode.",price:"Rp53.000",img:IMG.thermal,url:SHOP},
{id:6,cat:"Label Thermal",name:"LABEL THERMAL 80 X 30 MM — ISI 1.000 PCS",desc:"Direct Thermal 8 × 3 cm.",price:"Rp40.800",img:IMG.thermal,url:SHOP},
{id:7,cat:"Label Thermal",name:"LABEL THERMAL 33 X 19 MM — 2 LINE / 3 LINE",desc:"Label barcode thermal 33 × 19 mm. Tersedia pilihan 2 line dan 3 line.",price:"Rp28.000–Rp98.000",img:IMG.thermal33x19,url:"https://shopee.co.id/LABEL-THERMAL-33-X-19-Label-Barcode-Direct-Thermal-33X19-mm-Stiker-Thermal-33-x-19-2-Line-3-lINE-isi-10.000-pcs-i.708541841.26950989497"},
{id:8,cat:"Label Thermal",name:"LABEL THERMAL 33 X 15 MM — 2 LINE / 3 LINE",desc:"Label barcode direct thermal ukuran kecil, tersedia beberapa jumlah isi.",price:"Rp25.000–Rp93.000",img:IMG.thermal33x15,url:"https://shopee.co.id/LABEL-THERMAL-33-X-15-Label-Barcode-Direct-Thermal-33x15-mm-Stiker-Thermal-33x15-2-Line-3-lINE-isi-10.000-pcs-i.708541841.27400984071"},
{id:9,cat:"Label Thermal",name:"LABEL THERMAL 78 X 100 MM",desc:"Kertas stiker thermal untuk barcode dan pengiriman.",price:"Rp12.000",img:IMG.thermal,url:SHOP},
{id:10,cat:"Label Semicoated",name:"LABEL SEMICOATED 80 X 50 MM — ISI 1.000 PCS",desc:"Label barcode semicoated 8 × 5 cm. Memerlukan ribbon saat dicetak.",price:"Rp26.000–Rp50.000",img:IMG.semicoated,url:"https://shopee.co.id/LABEL-SEMICOATED-80-X-50-1000-PCS-Label-Barcode-Semicoated-80x50-MM-Stiker-Semicoated-8-x-5-cm-isi-1000-pcs-i.708541841.25000764796"},
{id:11,cat:"Label Semicoated",name:"LABEL SEMICOATED 60 X 40 MM — ISI 1.000 PCS",desc:"Label barcode semicoated 6 × 4 cm.",price:"Rp31.000",img:IMG.semicoated,url:SHOP},
{id:12,cat:"Label Semicoated",name:"LABEL SEMICOATED 80 X 30 MM — ISI 1.000 PCS",desc:"Label barcode semicoated 8 × 3 cm.",price:"Rp32.000",img:IMG.semicoated,url:SHOP},
{id:13,cat:"Label Semicoated",name:"LABEL SEMICOATED 100 X 40 MM — ISI 1.000 PCS",desc:"Label barcode semicoated 10 × 4 cm.",price:"Rp55.000",img:IMG.semicoated,url:SHOP},
{id:14,cat:"Label Semicoated",name:"LABEL SEMICOATED 100 X 30 MM — ISI 1.000 PCS",desc:"Label barcode semicoated 10 × 3 cm.",price:"Rp45.000",img:IMG.semicoated,url:SHOP},
{id:15,cat:"Label Semicoated",name:"LABEL SEMICOATED 102 X 48 MM — ISI 1.000 PCS",desc:"Label barcode semicoated 102 × 48 mm.",price:"Rp61.000",img:IMG.semicoated2,url:SHOP},
{id:16,cat:"Stiker Bulat",name:"STIKER BULAT WARNA — COLOR DOT STICKERS",desc:"Stiker bulat warna-warni untuk penanda dan kebutuhan operasional.",price:"Rp12.000–Rp15.000",img:IMG.roundColor,url:"https://shopee.co.id/STIKER-BULAT-WARNA-COLOR-DOT-STICKERS-i.708541841.22881991619"},
{id:17,cat:"Stiker Bulat",name:"STIKER BULAT WARNA 25 MM — ROL",desc:"Color dot sticker diameter 25 mm.",price:"Rp9.350",img:IMG.roundColor,url:SHOP},
{id:18,cat:"Stiker Bulat",name:"STIKER BULAT ANGKA TAHAN AIR 20 MM",desc:"Stiker angka vinyl waterproof diameter 2 cm.",price:"Rp9.950",img:IMG.roundNumber,url:SHOP},
{id:19,cat:"Stiker HVS",name:"STIKER HVS PUTIH DOFF A4 — 20 LEMBAR",desc:"Stiker HVS putih doff, cocok untuk printer inkjet dan laser.",price:"Rp21.500",img:IMG.roundColor,url:"https://shopee.co.id/Stiker-HVS-Putih-Doff-A4-isi-20-Lembar-Kertas-Sticker-HVS-Matte-Putih-20-lembar-i.708541841.41657556010"},
{id:20,cat:"Stiker HVS",name:"STIKER HVS PUTIH DOFF A4 — 50 LEMBAR",desc:"Stiker HVS putih doff dengan pilihan isi lebih banyak.",price:"Rp40.500",img:IMG.roundColor,url:SHOP},
{id:21,cat:"Label Size",name:"STIKER SIZE BAJU — XS S M L XL XXL 3XL 4XL 5XL",desc:"Label size pakaian untuk kebutuhan fashion dan garment.",price:"Rp10.500",img:IMG.roundSize,url:SHOP},
{id:22,cat:"Label Barcode",name:"LABEL BARCODE THERMAL — BERBAGAI UKURAN",desc:"Pilihan ukuran label untuk barcode, gudang, retail, dan pengiriman.",price:"Konsultasi",img:IMG.blackmark,url:SHOP},
{id:23,cat:"Label Numbering",name:"LABEL NUMBERING",desc:"Label bernomor untuk kebutuhan identifikasi dan operasional.",price:"Konsultasi",img:IMG.roundNumber,url:SHOP},
{id:24,cat:"Label Fashion",name:"LABEL SIZE & IDENTITAS PRODUK",desc:"Pilihan label untuk kebutuhan garment, fashion, dan retail.",price:"Konsultasi",img:IMG.roundSize,url:SHOP},
{id:25,cat:"Stiker Huruf",name:"STIKER HURUF — ABJAD 8 MM",desc:"Stiker huruf abjad untuk penandaan dan kebutuhan identifikasi.",price:"Rp12.100",img:IMG.roundArrow,url:"https://shopee.co.id/STIKER-HURUF-ABJAD-8-MM-i.708541841.24951486737"},
{id:26,cat:"Label Thermal",name:"LABEL THERMAL 100 X 100 MM — ISI 500 PCS",desc:"Direct thermal 10 × 10 cm untuk kebutuhan label dan barcode.",price:"Rp53.000–Rp58.000",img:IMG.thermal,url:"https://shopee.co.id/LABEL-THERMAL-100-X-100-isi-500-pcs-Label-Barcode-Direct-Thermal-100X100-mm-Stiker-Thermal-10-x-10-cm-isi-500-PCS-i.708541841.18968162251"},
{id:27,cat:"Stiker Bulat",name:"STIKER ONLY 25 MM — PILIHAN NOMINAL",desc:"Stiker bulat 25 mm dengan pilihan nominal 5K sampai 100K.",price:"Rp10.300",img:IMG.roundColor,url:"https://shopee.co.id/STIKER-ONLY-25-MM-2-5-CM-5k-10k-15k-20k-25k-30k-50k-100k-i.708541841.24802248744"},
{id:28,cat:"Stiker Bulat",name:"STIKER BULAT ANGKA 30 MM",desc:"Stiker angka bulat 3 cm dengan pilihan angka 1–12.",price:"Rp13.000",img:IMG.roundNumber,url:"https://shopee.co.id/STIKER-BULAT-ANGKA-30-mm-Stiker-Angka-Bulat-3-CM-Stiker-Warna-Angka-1-2-3-4-5-6-7-8-9-10-11-12-i.708541841.48655027483"},
{id:29,cat:"Label Numbering",name:"STIKER NUMBERING BLITZ 2234 / 2253",desc:"Sticker numbering dengan lem lebih lengket untuk kebutuhan identifikasi.",price:"Rp15.600",img:IMG.blackmark,url:"https://shopee.co.id/LABEL-STIKER-NUMBERING-BLITZ-2234-2253-LEM-LEBIH-LENGKET-i.708541841.23120588817"},
{id:30,cat:"Label Numbering",name:"STICKER NUMBERING BLITZ 2663 — 9 DIGIT",desc:"Sticker numbering Blitz 2663 dengan lem standar, pilihan 9 digit.",price:"Rp16.500–Rp17.600",img:IMG.blackmark,url:"https://shopee.co.id/LABEL-STICKER-NUMBERING-BLITZ-2663-LEM-STANDAR-9-Digit-Paxar-i.708541841.17291152724"},
{id:31,cat:"Ribbon",name:"RIBBON BARCODE PREMIUM WAX 110 X 300 M",desc:"Ribbon barcode premium wax untuk kebutuhan cetak label.",price:"Rp33.500",img:IMG.ribbon,url:"https://shopee.co.id/RIBBON-Barcode-PREMIUM-WAX-110-X-300-METER-Ribbon-Premium-Wax-110x300-M-i.708541841.22937576559"}];

window.ANIMO_CATALOG=ANIMO_CATALOG;
function escapeHtml(s){return String(s).replace(/[&<>"']/g,m=>({"&":"&amp;","<":"&lt;",">":"&gt;","\"":"&quot;","'":"&#039;"}[m]));}
function renderCatalog(target,filter="",query=""){
 const q=query.trim().toLowerCase();
 const list=ANIMO_CATALOG.filter(p=>(filter==="Semua"||!filter||p.cat===filter)&&(!q||[p.name,p.cat,p.desc].join(" ").toLowerCase().includes(q)));
 target.innerHTML=list.map(p=>'<article class="product-card catalog-product-card"><a class="product-image" href="produk-detail.html?id='+p.id+'"><img src="'+p.img+'" alt="'+escapeHtml(p.name)+'" loading="lazy" referrerpolicy="no-referrer" onerror="this.onerror=null;this.src=\'assets/img-placeholder.svg\'"></a><div class="product-info"><small>'+escapeHtml(p.cat)+'</small><h3>'+escapeHtml(p.name)+'</h3><p>'+escapeHtml(p.desc)+'</p><strong>'+escapeHtml(p.price)+'</strong><div class="product-card-actions"><a class="text-link" href="produk-detail.html?id='+p.id+'">Detail produk →</a><a class="text-link" href="'+p.url+'" target="_blank" rel="noopener">Shopee →</a></div></div></article>').join("")||'<div class="empty-state"><h3>Produk tidak ditemukan</h3><p>Coba kata kunci atau kategori lainnya.</p></div>';
 const count=target.closest(".catalog-shell")?.querySelector("[data-catalog-count]");if(count)count.textContent=list.length+" produk";
}
document.addEventListener("DOMContentLoaded",()=>{
 const grid=document.querySelector("[data-catalog]");if(!grid)return;
 const filters=[...document.querySelectorAll("[data-category]")],input=document.querySelector("[data-catalog-search]"),clear=document.querySelector("[data-catalog-clear]");
 let active=new URLSearchParams(location.search).get("category")||"Semua",q=new URLSearchParams(location.search).get("q")||"";
 if(input)input.value=q;
 function update(){filters.forEach(b=>b.classList.toggle("active",b.dataset.category===active));renderCatalog(grid,active,q);const u=new URL(location.href);active&&active!=="Semua"?u.searchParams.set("category",active):u.searchParams.delete("category");q?u.searchParams.set("q",q):u.searchParams.delete("q");history.replaceState(null,"",u);}
 filters.forEach(b=>b.addEventListener("click",()=>{active=b.dataset.category;q=input?.value||"";update()}));
 input?.addEventListener("input",()=>{q=input.value;update()});
 clear?.addEventListener("click",()=>{q="";if(input)input.value="";update();input?.focus()});
 update();
});