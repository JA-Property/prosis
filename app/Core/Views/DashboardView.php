<div class="bg-white p-4 shadow rounded">
  <h1 class="text-xl font-semibold mb-2">Welcome to Pro SIS</h1>
  <p>Your main content area goes here.</p>
  
  <!-- Pretty session dump -->
  <div class="mt-4 p-4 bg-gray-100 rounded font-mono text-sm">
    <h2 class="text-lg font-semibold mb-2">Session Data</h2>
    <pre><?php echo htmlspecialchars(json_encode($_SESSION, JSON_PRETTY_PRINT)); ?></pre>
  </div>
</div>
