</main>
</div>
</div>
<script>
(function(){
  const sidebar=document.getElementById('adminSidebar');
  const toggle=document.querySelector('[data-sidebar-toggle]');
  const submenu=document.querySelector('[data-submenu-toggle]');
  const sub=document.getElementById('contentSubmenu');
  if(toggle) toggle.addEventListener('click',()=>document.body.classList.toggle('sidebar-open'));
  document.addEventListener('click',e=>{
    if(window.innerWidth<=900 && document.body.classList.contains('sidebar-open') && sidebar && !sidebar.contains(e.target) && !e.target.closest('[data-sidebar-toggle]')){
      document.body.classList.remove('sidebar-open');
    }
  });
  if(submenu && sub) submenu.addEventListener('click',()=>{
    const open=sub.classList.toggle('open');
    submenu.setAttribute('aria-expanded',open?'true':'false');
  });
})();
</script>
</body></html>