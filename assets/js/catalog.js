/* =========================================================
   ANIMO LABEL — DATA PRODUK
   ---------------------------------------------------------
   EDIT MANUAL DI BAGIAN ANIMO_CATALOG DI BAWAH INI.

   Yang bisa diubah:
   - name  = nama produk
   - price = harga produk
   - desc  = keterangan/deskripsi
   - cat   = kategori
   - img   = nama/path foto produk
   - url   = link Shopee produk

   Jika produk BELUM punya foto, gunakan: img:""
========================================================= */

const SHOP="https://shopee.co.id/animolabel";
const P="assets/produk/";
const IMG={
 thermal:"assets/produk/LABEL THERMAL 70 X 50 MM — ISI 1.000 PCS.png",
 thermal80x50:"assets/produk/LABEL THERMAL 80 X 50 MM — ISI 1.000 PCS.png",
 thermal65x40:"assets/produk/LABEL THERMAL 65 X 40 MM — ISI 1.000 PCS.png",
 thermal50x60:"assets/produk/LABEL THERMAL 50 X 60 MM — ISI 1.000 PCS.png",
 thermal33x15:"assets/produk/label thermal 33x15mm.jpg",
 thermal33x19:"",
 semicoated:"assets/produk/label semicoated warna.jpg",
 semicoated2:"assets/produk/label semicoated 2 line.jpg",
 roundColor:"assets/produk/Stiker Bulat Warna.jpg",
 roundNumber:"assets/produk/Stiker Bulat Angka.jpg",
 roundArrow:"assets/produk/Stiker Bulat Panah.jpg",
 roundSize:"assets/produk/Stiker Bulat Size.jpg",
 huruf:"assets/produk/Stiker Bulat Huruf.jpg",
 blackmark:"assets/produk/Label blackmark.jpg",
 arrow:"assets/produk/stiker panah 1cm.jpg",
 ribbon:"assets/produk/ribbon barcode full resin 110x300.jpg"
};
/* =========================================================
   KATALOG PRODUK
========================================================= */
const ANIMO_CATALOG=[
{id:1,cat:"Label Thermal",name:"LABEL THERMAL 100 X 50 MM — ISI 1.000 PCS",desc:"Label thermal 100 × 50 mm untuk kebutuhan barcode dan label.",price:"",img:"assets/produk/LABEL THERMAL 100 X 50 isi 1.000 PCS.png",url:""},
{id:2,cat:"Label Thermal",name:"LABEL THERMAL 33 X 19 MM — 2 LINE — ISI 1.000 PCS WATERPROOF",desc:"Label thermal 33 × 19 mm, 2 line, waterproof.",price:"Rp28.000–Rp98.000",img:"assets/produk/LABEL THERMAL 33 X 19 MM 2 LINE ISI 1000 PCS WATERPROOF.png",url:"https://shopee.co.id/LABEL-THERMAL-33-X-19-Label-Barcode-Direct-Thermal-33X19-mm-Stiker-Thermal-33-x-19-2-Line-3-lINE-isi-10.000-pcs-i.708541841.26950989497"},
{id:3,cat:"Label Thermal",name:"LABEL THERMAL 33 X 19 MM — 2 LINE — ISI 10.000 PCS",desc:"Label thermal 33 × 19 mm untuk kebutuhan barcode.",price:"Rp28.000–Rp98.000",img:"assets/produk/LABEL THERMAL 33 X 19mm 2 Line 10.000 pcs.png",url:"https://shopee.co.id/LABEL-THERMAL-33-X-19-Label-Barcode-Direct-Thermal-33X19-mm-Stiker-Thermal-33-x-19-2-Line-3-lINE-isi-10.000-pcs-i.708541841.26950989497"},
{id:4,cat:"Label Thermal",name:"LABEL THERMAL 50 X 60 MM — ISI 1.000 PCS",desc:"Direct thermal 50 × 60 mm.",price:"Rp23.000–Rp81.000",img:"assets/produk/LABEL THERMAL 50 X 60 MM — ISI 1.000 PCS.png",url:"https://shopee.co.id/LABEL-THERMAL-50X60-BARCODE-Thermal-50-X-60-MM-Direct-Thermal-50-X-60-mm-Stiker-Thermal-5-x-6-cm-ISI-1000-PCS-i.708541841.25180010774"},
{id:5,cat:"Label Thermal",name:"LABEL THERMAL 65 X 40 MM — ISI 1.000 PCS",desc:"Direct thermal 65 × 40 mm.",price:"Rp40.000",img:"assets/produk/LABEL THERMAL 65 X 40 MM — ISI 1.000 PCS.png",url:"https://shopee.co.id/LABEL-THERMAL-65-X-40-isi-1000-PCS-Direct-Thermal-65X40-MM-Label-Barcode-Thermal-65X40-MM-ISI-1.000-PCS-i.708541841.50703401473"},
{id:6,cat:"Label Thermal",name:"LABEL THERMAL 70 X 50 MM — ISI 1.000 PCS",desc:"Direct thermal 70 × 50 mm untuk barcode.",price:"Rp27.040–Rp55.000",img:"assets/produk/LABEL THERMAL 70 X 50 MM — ISI 1.000 PCS.png",url:"https://shopee.co.id/LABEL-THERMAL-70X50-1.000-Pcs-BARCODE-Thermal-70-X-50-MM-70-mm-X-50-mm-7-x-5-cm-ISI-1000-PCS-i.708541841.24527185171"},
{id:7,cat:"Label Thermal",name:"LABEL THERMAL 78 X 100 MM — ISI 90 PCS",desc:"Label thermal 78 × 100 mm.",price:"Rp12.000",img:"assets/produk/LABEL THERMAL 78 X 100 MM.png",url:""},
{id:8,cat:"Label Thermal",name:"LABEL THERMAL 80 X 50 MM — ISI 1.000 PCS",desc:"Stiker thermal 80 × 50 mm untuk printer barcode.",price:"Rp28.500–Rp58.200",img:"assets/produk/LABEL THERMAL 80 X 50 MM — ISI 1.000 PCS.png",url:""},
{id:9,cat:"Label Barcode",name:"LABEL BARCODE THERMAL BLACKMARK",desc:"Label thermal dengan blackmark untuk kebutuhan printer barcode.",price:"",img:"assets/produk/Label blackmark.jpg",url:""},
{id:10,cat:"Stiker Bulat",name:"STIKER BULAT ANGKA",desc:"Stiker bulat angka untuk penandaan.",price:"Rp13.000",img:"assets/produk/Stiker Bulat Angka.jpg",url:"https://shopee.co.id/STIKER-BULAT-ANGKA-30-mm-Stiker-Angka-Bulat-3-CM-Stiker-Warna-Angka-1-2-3-4-5-6-7-8-9-10-11-12-i.708541841.48655027483"},
{id:11,cat:"Stiker Huruf",name:"STIKER BULAT HURUF",desc:"Stiker huruf untuk kebutuhan identifikasi.",price:"Rp12.100",img:"assets/produk/Stiker Bulat Huruf.jpg",url:"https://shopee.co.id/STIKER-HURUF-ABJAD-8-MM-i.708541841.24951486737"},
{id:12,cat:"Stiker Bulat",name:"STIKER BULAT PANAH",desc:"Stiker bulat dengan simbol panah.",price:"",img:"assets/produk/Stiker Bulat Panah.jpg",url:""},
{id:13,cat:"Label Size",name:"STIKER BULAT SIZE / UKURAN BAJU",desc:"Stiker size pakaian untuk kebutuhan fashion.",price:"Rp10.500",img:"assets/produk/Stiker Bulat Size.jpg",url:""},
{id:14,cat:"Stiker Bulat",name:"STIKER BULAT WARNA — COLOR DOT STICKERS",desc:"Stiker bulat warna-warni untuk penanda.",price:"Rp12.000–Rp15.000",img:"assets/produk/Stiker Bulat Warna.jpg",url:"https://shopee.co.id/STIKER-BULAT-WARNA-COLOR-DOT-STICKERS-i.708541841.22881991619"},
{id:15,cat:"Label Semicoated",name:"LABEL SEMICOATED 80 X 50 MM — ISI 1.000 PCS",desc:"Label barcode semicoated 80 × 50 mm.",price:"Rp26.000–Rp50.000",img:"assets/produk/label semicoated warna.jpg",url:"https://shopee.co.id/LABEL-SEMICOATED-80-X-50-1000-PCS-Label-Barcode-Semicoated-80x50-MM-Stiker-Semicoated-8-x-5-cm-isi-1000-pcs-i.708541841.25000764796"},
{id:16,cat:"Label Semicoated",name:"LABEL SEMICOATED 2 LINE / BERBAGAI UKURAN",desc:"Label semicoated 2 line untuk printer thermal transfer.",price:"",img:"assets/produk/label semicoated 2 line.jpg",url:""},
{id:17,cat:"Label Thermal",name:"LABEL THERMAL 33 X 15 MM — 2 LINE / 3 LINE",desc:"Label barcode direct thermal ukuran 33 × 15 mm.",price:"Rp25.000–Rp93.000",img:"assets/produk/label thermal 33x15mm.jpg",url:"https://shopee.co.id/LABEL-THERMAL-33-X-15-Label-Barcode-Direct-Thermal-33x15-mm-Stiker-Thermal-33x15-2-Line-3-lINE-isi-10.000-pcs-i.708541841.27400984071"},
{id:18,cat:"Label Thermal",name:"LABEL THERMAL 33 X 15 MM — WARNA 3 LINE",desc:"Label thermal warna 33 × 15 mm, 3 line.",price:"Rp25.000–Rp93.000",img:"assets/produk/label thermal warna 3 line 33x15mm.jpg",url:"https://shopee.co.id/LABEL-THERMAL-33-X-15-Label-Barcode-Direct-Thermal-33x15-mm-Stiker-Thermal-33x15-2-Line-3-lINE-isi-10.000-pcs-i.708541841.27400984071"},
{id:19,cat:"Label Thermal",name:"LABEL THERMAL / PRODUK LABEL THERMAL",desc:"Foto produk label thermal untuk katalog.",price:"",img:"assets/produk/produk-label-thermal-01 (7).jpg",url:""},
{id:20,cat:"Ribbon",name:"RIBBON BARCODE FULL RESIN 110 X 300 M",desc:"Ribbon barcode full resin 110 × 300 meter.",price:"",img:"assets/produk/ribbon barcode full resin 110x300.jpg",url:""},
{id:21,cat:"Stiker Panah",name:"STIKER PANAH 1 CM",desc:"Stiker panah 1 cm untuk penandaan.",price:"",img:"assets/produk/stiker panah 1cm.jpg",url:""}];

/* =========================================================
   JANGAN UBAH BAGIAN DI BAWAH INI KECUALI ANDA MEMAHAMI JAVASCRIPT
========================================================= */
window.ANIMO_CATALOG=ANIMO_CATALOG;
function escapeHtml(s){return String(s).replace(/[&<>"']/g,m=>({"&":"&amp;","<":"&lt;",">":"&gt;","\"":"&quot;","'":"&#039;"}[m]));}
function renderCatalog(target,filter="",query=""){
 const q=query.trim().toLowerCase();
 const list=ANIMO_CATALOG.filter(p=>(filter==="Semua"||!filter||p.cat===filter)&&(!q||[p.name,p.cat,p.desc].join(" ").toLowerCase().includes(q)));
 target.innerHTML=list.map(p=>{
  const image=p.img
   ? '<img src="'+p.img+'" alt="'+escapeHtml(p.name)+'" loading="lazy" referrerpolicy="no-referrer" onerror="this.onerror=null;this.src=\'assets/img-placeholder.svg\'">'
   : '<div class="product-image-placeholder" aria-label="Foto produk belum diisi">Foto produk belum diisi</div>';
  const price=p.price||"Harga belum diisi";
  const shopee=p.url
   ? '<a class="text-link" href="'+p.url+'" target="_blank" rel="noopener">Shopee →</a>'
   : '<span class="text-link product-link-pending">Link Shopee belum diisi</span>';
  return '<article class="product-card catalog-product-card"><a class="product-image" href="produk-detail.html?id='+p.id+'">'+image+'</a><div class="product-info"><small>'+escapeHtml(p.cat)+'</small><h3>'+escapeHtml(p.name)+'</h3><p>'+escapeHtml(p.desc)+'</p><strong>'+escapeHtml(price)+'</strong><div class="product-card-actions"><a class="text-link" href="produk-detail.html?id='+p.id+'">Detail produk →</a>'+shopee+'</div></div></article>';
 }).join("")||'<div class="empty-state"><h3>Produk tidak ditemukan</h3><p>Coba kata kunci atau kategori lainnya.</p></div>';
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