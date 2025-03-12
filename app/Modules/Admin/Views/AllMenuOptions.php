<?php
/**
 * @var array $menuTree - an array of all items (with nested children).
 */

function renderMenuTreeAccordion(array $nodes)
{
    // We'll loop each top-level node in an Accordion
    // If it has children, they will show in a collapsible panel.
    foreach ($nodes as $node) {
        // Each node is "draggable"
        // We'll also nest children if any exist
        ?>
        <div class="border border-gray-300 rounded mb-2" data-menu-item-id="<?= $node['id'] ?>" draggable="true">
          <!-- Header row with label, icon, and action buttons -->
          <div class="bg-gray-100 px-3 py-2 flex items-center cursor-move drag-handle">
            <!-- Accordion toggle arrow (only if children exist) -->
            <?php if (!empty($node['children'])): ?>
              <button type="button" class="mr-2 text-gray-500 accordion-toggle" data-accordion-target="#accordion-<?= $node['id'] ?>">
                <i class="fas fa-chevron-right transform transition-transform"></i>
              </button>
            <?php else: ?>
              <span class="mr-2 text-gray-300"><i class="fas fa-circle"></i></span>
            <?php endif; ?>

            <!-- Icon (if any) -->
            <?php if (!empty($node['icon'])): ?>
              <i class="fas <?= htmlspecialchars($node['icon']) ?> mr-2"></i>
            <?php endif; ?>

            <!-- Label -->
            <span class="font-semibold mr-2"><?= htmlspecialchars($node['label']) ?></span>

            <!-- Link (optional) -->
            <?php if (!empty($node['link'])): ?>
              <span class="text-sm text-gray-600">[<?= htmlspecialchars($node['link']) ?>]</span>
            <?php endif; ?>

            <!-- Action Buttons (Edit, Delete, Add Child, etc.) -->
            <div class="ml-auto space-x-2">
              <a href="/admin/menu/edit/<?= $node['id'] ?>" 
                 class="text-blue-600 hover:underline">Edit</a>
              <a href="/admin/menu/delete/<?= $node['id'] ?>" 
                 class="text-red-600 hover:underline">Delete</a>
              <a href="/admin/menu/add-child/<?= $node['id'] ?>" 
                 class="text-green-600 hover:underline">Add Child</a>
            </div>
          </div>

          <?php if (!empty($node['children'])): ?>
            <!-- Collapsible panel for children -->
            <div id="accordion-<?= $node['id'] ?>" class="hidden pl-8 pr-2 py-2 accordion-content">
              <?php renderMenuTreeAccordion($node['children']); ?>
            </div>
          <?php endif; ?>
        </div>
        <?php
    }
}
?>

<div class="p-4 bg-white rounded shadow">
  <h1 class="text-2xl font-bold mb-4">All Menu Options (Advanced)</h1>

  <div class="flex items-center justify-between mb-4">
    <p class="text-gray-700">Here you can manage the entire menu hierarchy.</p>
    <!-- A button to create a brand new top-level item -->
    <a href="/admin/menu/add" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
      + New Top-Level
    </a>
  </div>

  <!-- Container for top-level drag & drop -->
  <div id="topLevelContainer" class="space-y-2">
    <?php renderMenuTreeAccordion($menuTree); ?>
  </div>

  <!-- A button to save the new sort order (if you reorder by drag & drop) -->
  <button id="saveOrderBtn" 
          class="mt-4 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
    Save Sort Order
  </button>
</div>

<!-- TAILWIND CLASSES + FontAwesome icons are already presumably loaded in your layout -->

<script>
/**
 * 1) Simple Accordion Logic
 */
document.querySelectorAll('.accordion-toggle').forEach(toggleBtn => {
  toggleBtn.addEventListener('click', (e) => {
    const targetId = toggleBtn.getAttribute('data-accordion-target');
    const targetEl = document.querySelector(targetId);
    if (!targetEl) return;

    // Toggle hidden
    targetEl.classList.toggle('hidden');
    // Rotate the arrow
    const icon = toggleBtn.querySelector('i.fas');
    if (icon) icon.classList.toggle('rotate-90');
  });
});

/**
 * 2) Basic Drag & Drop for Reordering
 * - Each .border (the parent div) is draggable
 * - We handle dragstart, dragover, drop to reorder DOM
 */
let draggedEl = null;

document.querySelectorAll('[draggable="true"]').forEach(item => {
  item.addEventListener('dragstart', (e) => {
    draggedEl = item;
    // Add a CSS class or something to highlight
    e.dataTransfer.effectAllowed = 'move';
  });

  item.addEventListener('dragover', (e) => {
    e.preventDefault();
    // We can insert the dragged element before/after this one,
    // depending on mouse position, etc.
  });

  item.addEventListener('drop', (e) => {
    e.preventDefault();
    if (draggedEl && draggedEl !== item) {
      // Insert draggedEl before the current item in the DOM
      // or after it. Let's do a simple 'insert above' for demonstration.
      item.parentNode.insertBefore(draggedEl, item);
    }
    draggedEl = null;
  });
});

/**
 * 3) "Save Sort Order" logic
 *  - We'll gather the IDs in the new order and send them via fetch/POST.
 *  - The server would then update sort_order in DB accordingly.
 */
document.getElementById('saveOrderBtn').addEventListener('click', () => {
  // gather all top-level items in topLevelContainer
  const container = document.getElementById('topLevelContainer');
  const itemEls = container.querySelectorAll('[data-menu-item-id]');

  const newOrder = [];
  itemEls.forEach((el, index) => {
    newOrder.push({
      id: el.getAttribute('data-menu-item-id'),
      position: index + 1
    });
  });

  // Example: post to /admin/menu/reorder
  fetch('/admin/menu/reorder', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ order: newOrder })
  })
    .then(response => response.json())
    .then(data => {
      alert('Sort order saved!'); 
      // or handle any error
    })
    .catch(err => console.error('Sort order error:', err));
});
</script>
