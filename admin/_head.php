<?php
require_once '../config/database.php';
require_once '../includes/functions.php';
require_admin();

$title = $title ?? 'Admin';
$current = basename($_SERVER['PHP_SELF']);
$isContent = in_array($current, ['content.php','categories.php','banners.php','portfolio.php'], true);
function admin_icon($name){
    $icons = [
        'dashboard'=>'<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/></svg>',
        'content'=>'<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H20v15.5A2.5 2.5 0 0 0 17.5 16H4V5.5Z"/><path d="M4 16v3a2 2 0 0 0 2 2h12"/><path d="M8 7h8M8 10h8"/></svg>',
        'category'=>'<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 5h6v6H4zM14 5h6v6h-6zM4 15h6v4H4zM14 15h6v4h-6z"/></svg>',
        'banner'=>'<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><circle cx="8" cy="10" r="1.5"/><path d="m5 16 4-4 3 3 2-2 5 3"/></svg>',
        'portfolio'=>'<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m5 16 4-4 3 3 2-2 5 3"/></svg>',
        'product'=>'<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m4 7 8-4 8 4-8 4-8-4Z"/><path d="M4 7v10l8 4 8-4V7M12 11v10"/></svg>',
        'media'=>'<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="4" width="18" height="16" rx="2"/><circle cx="8" cy="9" r="1.5"/><path d="m5 17 5-5 3 3 2-2 4 4"/></svg>',
        'settings'=>'<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 8.5A3.5 3.5 0 1 0 12 15.5 3.5 3.5 0 0 0 12 8.5Z"/><path d="m19.4 15 .1.1-1.8 3.1-.1-.1a2 2 0 0 0-2.1-.2l-.4.2a2 2 0 0 0-1.1 1.8v.1h-3.6v-.1a2 2 0 0 0-1.1-1.8l-.4-.2a2 2 0 0 0-2.1.2l-.1.1-1.8-3.1.1-.1a2 2 0 0 0 .1-2.1l-.2-.4A2 2 0 0 0 3.1 11H3V7.4h.1a2 2 0 0 0 1.8-1.1l.2-.4a2 2 0 0 0-.1-2.1l-.1-.1L6.7.6l.1.1a2 2 0 0 0 2.1.2l.4-.2A2 2 0 0 0 10.4-1V-1H14v.1a2 2 0 0 0 1.1 1.8l.4.2a2 2 0 0 0 2.1-.2l.1-.1 1.8 3.1-.1.1a2 2 0 0 0-.1 2.1l.2.4A2 2 0 0 0 21 7.4h.1V11H21a2 2 0 0 0-1.8 1.1l-.2.4a2 2 0 0 0 .4 2.5Z"/></svg>',
        'logout'=>'<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M10 5H5v14h5M14 8l4 4-4 4M9 12h9"/></svg>',
        'menu'=>'<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 6h16M4 12h16M4 18h16"/></svg>'
    ];
    return $icons[$name] ?? '';
}
?><!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?=e($title)?> · Animo Label CMS</title>
<link rel="stylesheet" href="admin.css">
</head>
<body class="admin-body">
<div class="admin-shell">
<aside class="admin-sidebar" id="adminSidebar">
  <div class="sidebar-brand">
    <a href="dashboard.php" class="brand-mark" aria-label="Animo Label Dashboard">
      <span class="brand-dot"></span><span>ANIMO</span>
    </a>
    <div class="brand-sub">LABEL · CMS</div>
  </div>

  <nav class="sidebar-nav" aria-label="Navigasi Admin">
    <div class="nav-section-label">MENU UTAMA</div>
    <a class="side-link <?=$current==='dashboard.php'?'active':''?>" href="dashboard.php"><?=admin_icon('dashboard')?><span>Dashboard</span></a>

    <button class="side-link side-parent <?=$isContent?'active':''?>" type="button" aria-expanded="<?=$isContent?'true':'false'?>" aria-controls="contentSubmenu" data-submenu-toggle>
      <?=admin_icon('content')?><span>Konten</span><span class="chevron">⌄</span>
    </button>
    <div class="side-submenu <?=$isContent?'open':''?>" id="contentSubmenu">
      <a class="<?=$current==='categories.php'?'active':''?>" href="categories.php"><?=admin_icon('category')?><span>Kategori</span></a>
      <a class="<?=$current==='banners.php'?'active':''?>" href="banners.php"><?=admin_icon('banner')?><span>Banner</span></a>
      <a class="<?=$current==='portfolio.php'?'active':''?>" href="portfolio.php"><?=admin_icon('portfolio')?><span>Portfolio</span></a>
    </div>

    <a class="side-link <?=$current==='products.php'?'active':''?>" href="products.php"><?=admin_icon('product')?><span>Produk</span></a>
    <a class="side-link <?=$current==='media.php'?'active':''?>" href="media.php"><?=admin_icon('media')?><span>Media</span></a>

    <div class="nav-section-label nav-settings-label">SISTEM</div>
    <a class="side-link <?=$current==='settings.php'?'active':''?>" href="settings.php"><?=admin_icon('settings')?><span>Pengaturan</span></a>
  </nav>

  <div class="sidebar-bottom">
    <a class="side-link logout-link" href="logout.php"><?=admin_icon('logout')?><span>Keluar</span></a>
    <div class="sidebar-version">ANIMO LABEL CMS</div>
  </div>
</aside>

<div class="admin-main">
  <header class="admin-topbar">
    <button class="mobile-menu" type="button" aria-label="Buka menu" data-sidebar-toggle><?=admin_icon('menu')?></button>
    <div class="topbar-title">
      <span>ANIMO LABEL</span>
      <strong><?=e($title)?></strong>
    </div>
    <div class="topbar-user"><span class="user-dot"></span><span>Administrator</span></div>
  </header>
  <main class="admin-content">