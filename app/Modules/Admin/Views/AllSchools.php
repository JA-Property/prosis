<!-- AllSchools.php -->
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Schools</h1>

    <?php if (!empty($schools) && count($schools) > 0): ?>
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border-b">Name</th>
                    <th class="px-4 py-2 border-b">Abbreviation</th>
                    <th class="px-4 py-2 border-b">City</th>
                    <th class="px-4 py-2 border-b">State</th>
                    <th class="px-4 py-2 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($schools as $school): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b"><?php echo htmlspecialchars($school->name); ?></td>
                        <td class="px-4 py-2 border-b"><?php echo htmlspecialchars($school->abbreviation); ?></td>
                        <td class="px-4 py-2 border-b"><?php echo htmlspecialchars($school->city); ?></td>
                        <td class="px-4 py-2 border-b"><?php echo htmlspecialchars($school->state); ?></td>
                        <td class="px-4 py-2 border-b">
                            <a href="/admin/schools/edit/<?php echo $school->id; ?>" class="text-blue-500 hover:underline">Edit</a>
                            <form action="/admin/schools/destroy/<?php echo $school->id; ?>" method="POST" class="inline-block ml-2" onsubmit="return confirm('Are you sure you want to delete this school?');">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="mt-6 p-6 bg-blue-50 border border-blue-200 rounded">
            <h2 class="text-xl font-semibold mb-2">No Schools Found</h2>
            <p class="mb-4">You haven't added any schools yet.</p>
            <a href="/admin/schools/create" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Add Your First School
            </a>
        </div>
    <?php endif; ?>
</div>
