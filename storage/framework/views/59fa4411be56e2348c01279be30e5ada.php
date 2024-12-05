<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <title>Dashboard</title>
</head>
<body class="bg-gray-100">

    <div class="grid place-items-center ">
        <div class="container mx-auto bg-white shadow-lg rounded-lg p-8 ">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <img src="https://purepng.com/public/uploads/large/purepng.com-batman-logobatmansuperherocomicdc-comicscatwomen-1701528526422cief3.png" class="w-20 h-15" alt="Batman Logo">
                <a href="/create" class="btn btn-primary w-64 rounded-full">Add New Post</a>
            </div>

            <!-- Success Message -->
            <?php if(session('success')): ?>
                <div class="alert alert-success mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span><?php echo e(session('success')); ?></span>
                </div>
            <?php endif; ?>

            <!-- Table -->
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">#</th>
                            <th scope="col" class="py-3 px-6">Name</th>
                            <th scope="col" class="py-3 px-6">Description</th>
                            <th scope="col" class="py-3 px-6">Image</th>
                            <th scope="col" class="py-3 px-6 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="py-4 px-6"><?php echo e($post->id); ?></td>
                                <td class="py-4 px-6"><?php echo e($post->name); ?></td>
                                <td class="py-4 px-6"><?php echo e($post->description); ?></td>
                                <td class="py-4 px-6">
                                    <img src="images/<?php echo e($post->image); ?>" alt="<?php echo e($post->name); ?>" class="w-20 h-20 object-cover rounded">
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <a href="<?php echo e(route('edit', $post->id)); ?>" class="btn btn-sm btn-info mr-2">Update</a>
                                    <form method="POST" action="<?php echo e(route('delete', $post->id)); ?>" class="inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('delete'); ?>
                                        <button type="submit" class="btn btn-sm btn-error" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\crud\resources\views/welcome.blade.php ENDPATH**/ ?>