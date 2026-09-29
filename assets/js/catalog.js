const ANIMO_CATALOG=[
{id:1,cat:"Label Thermal",name:"LABEL THERMAL 70 X 50 MM — ISI 1.000 PCS",desc:"Direct Thermal untuk barcode dan kebutuhan label harian.",price:"Rp28.000–Rp55.000",img:"assets/banner-label-thermal.svg"},
{id:2,cat:"Label Thermal",name:"LABEL THERMAL 80 X 50 MM — ISI 1.000 PCS",desc:"Stiker thermal 8 × 5 cm untuk printer barcode.",price:"Rp28.500–Rp58.200",img:"assets/banner-label-thermal.svg"},
{id:3,cat:"Label Thermal",name:"LABEL THERMAL 65 X 40 MM — ISI 1.000 PCS",desc:"Direct Thermal 65 × 40 mm.",price:"Rp40.000",img:"assets/banner-label-thermal.svg"},
{id:4,cat:"Label Thermal",name:"LABEL THERMAL 50 X 60 MM — ISI 1.000 PCS",desc:"Direct Thermal 5 × 6 cm.",price:"Rp23.000–Rp81.000",img:"assets/banner-label-thermal.svg"},
{id:5,cat:"Label Thermal",name:"LABEL THERMAL 80 X 40 MM — ISI 1.000 PCS",desc:"Direct Thermal 8 × 4 cm untuk barcode.",price:"Rp53.000",img:"assets/banner-label-thermal.svg"},
{id:6,cat:"Label Thermal",name:"LABEL THERMAL 80 X 30 MM — ISI 1.000 PCS",desc:"Direct Thermal 8 × 3 cm.",price:"Rp40.800",img:"assets/banner-label-thermal.svg"},
{id:7,cat:"Label Thermal",name:"LABEL THERMAL 33 X 19 MM — 2 LINE",desc:"Label barcode thermal 33 × 19 mm, isi 1.000 pcs.",price:"Rp17.500",img:"assets/banner-label-thermal.svg"},
{id:8,cat:"Label Thermal",name:"LABEL THERMAL 33 X 15 MM",desc:"Label barcode direct thermal ukuran kecil.",price:"Rp25.000",img:"assets/banner-label-thermal.svg"},
{id:9,cat:"Label Thermal",name:"LABEL THERMAL 78 X 100 MM",desc:"Kertas stiker thermal untuk barcode dan pengiriman.",price:"Rp12.000",img:"assets/banner-label-thermal.svg"},
{id:10,cat:"Label Semicoated",name:"LABEL SEMICOATED 80 X 50 MM — ISI 1.000 PCS",desc:"Label barcode semicoated 8 × 5 cm.",price:"Rp26.000–Rp50.000",img:"assets/banner-label-yupo.svg"},
{id:11,cat:"Label Semicoated",name:"LABEL SEMICOATED 60 X 40 MM — ISI 1.000 PCS",desc:"Label barcode semicoated 6 × 4 cm.",price:"Rp31.000",img:"assets/banner-label-yupo.svg"},
{id:12,cat:"Label Semicoated",name:"LABEL SEMICOATED 80 X 30 MM — ISI 1.000 PCS",desc:"Label barcode semicoated 8 × 3 cm.",price:"Rp32.000",img:"assets/banner-label-yupo.svg"},
{id:13,cat:"Label Semicoated",name:"LABEL SEMICOATED 100 X 40 MM — ISI 1.000 PCS",desc:"Label barcode semicoated 10 × 4 cm.",price:"Rp55.000",img:"assets/banner-label-yupo.svg"},
{id:14,cat:"Label Semicoated",name:"LABEL SEMICOATED 100 X 30 MM — ISI 1.000 PCS",desc:"Label barcode semicoated 10 × 3 cm.",price:"Rp45.000",img:"assets/banner-label-yupo.svg"},
{id:15,cat:"Label Semicoated",name:"LABEL SEMICOATED 102 X 48 MM — ISI 1.000 PCS",desc:"Label barcode semicoated 102 × 48 mm.",price:"Rp61.000",img:"assets/banner-label-yupo.svg"},
{id:16,cat:"Stiker Bulat",name:"STIKER BULAT WARNA — COLOR DOT STICKERS",desc:"Stiker bulat warna-warni untuk penanda dan kebutuhan operasional.",price:"Rp12.000",img:"assets/banner-sticker-custom.svg"},
{id:17,cat:"Stiker Bulat",name:"STIKER BULAT WARNA 25 MM — ROL",desc:"Color dot sticker diameter 25 mm.",price:"Rp9.350",img:"assets/banner-sticker-custom.svg"},
{id:18,cat:"Stiker Bulat",name:"STIKER BULAT ANGKA TAHAN AIR 20 MM",desc:"Stiker angka vinyl waterproof diameter 2 cm.",price:"Rp9.950",img:"assets/banner-sticker-custom.svg"},
{id:19,cat:"Stiker HVS",name:"STIKER HVS PUTIH DOFF A4 — 20 LEMBAR",desc:"Kertas sticker HVS matte putih ukuran A4.",price:"Rp21.500",img:"assets/banner-sticker-custom.svg"},
{id:20,cat:"Stiker HVS",name:"STIKER HVS PUTIH DOFF A4 — 50 LEMBAR",desc:"Kertas sticker HVS matte putih ukuran A4.",price:"Rp40.500",img:"assets/banner-sticker-custom.svg"},
{id:21,cat:"Label Size",name:"STIKER SIZE BAJU — XS S M L XL XXL 3XL 4XL 5XL",desc:"Label size pakaian ukuran 1 cm.",price:"Rp10.500",img:"assets/banner-sticker-custom.svg"},
{id:22,cat:"Label Barcode",name:"LABEL BARCODE THERMAL — BERBAGAI UKURAN",desc:"Pilihan ukuran label untuk barcode, gudang, retail, dan pengiriman.",price:"Konsultasi",img:"assets/banner-label-thermal.svg"},
{id:23,cat:"Label Numbering",name:"LABEL NUMBERING",desc:"Label bernomor untuk kebutuhan identifikasi dan operasional.",price:"Konsultasi",img:"assets/banner-sticker-custom.svg"},
{id:24,cat:"Label Fashion",name:"LABEL SIZE & IDENTITAS PRODUK",desc:"Pilihan label untuk kebutuhan garment, fashion, dan retail.",price:"Konsultasi",img:"assets/banner-sticker-custom.svg"}];
function escapeHtml(s){return String(s).replace(/[&<>"']/g,m=>({"&":"&amp;","<":"&lt;",">":"&gt;","\"":"&quot;","'":"&#039;"}[m]));}
function renderCatalog(target,filter="",query=""){
 const q=query.trim().toLowerCase();
 const list=ANIMO_CATALOG.filter(p=>(filter==="Semua"||!filter||p.cat===filter)&&(!q||[p.name,p.cat,p.desc].join(" ").toLowerCase().includes(q)));
 target.innerHTML=list.map(p=>'<article class="product-card catalog-product-card"><a class="product-image" href="https://shopee.co.id/animolabel" target="_blank" rel="noopener"><img src="'+p.img+'" alt="'+escapeHtml(p.name)+'" loading="lazy"></a><div class="product-info"><small>'+escapeHtml(p.cat)+'</small><h3>'+escapeHtml(p.name)+'</h3><p>'+escapeHtml(p.desc)+'</p><strong>'+escapeHtml(p.price)+'</strong><a class="text-link" href="https://shopee.co.id/animolabel" target="_blank" rel="noopener">Lihat di marketplace →</a></div></article>').join("")||'<div class="empty-state"><h3>Produk tidak ditemukan</h3><p>Coba kata kunci atau kategori lainnya.</p></div>';
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