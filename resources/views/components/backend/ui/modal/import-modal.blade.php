<div id="{{ $id }}" class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-50 hidden"
    onclick="closeModal(event)">
    <div class="bg-white rounded-lg shadow-lg p-6" onclick="event.stopPropagation()">
        <h2 class="text-lg font-semibold mb-4">{{ $title }}</h2>
        <form action="{{ $actionUrl }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($method !== 'POST')
                @method($method)
            @endif
            <input type="file" name="file" required class="mb-4">
            <div class="flex justify-end">
                <button type="button" onclick="closeModal()"
                    class="mr-2 text-gray-600 hover:text-gray-800">Batal</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">{{ $buttonText }}</button>
            </div>
        </form>
    </div>
</div>

<script>
    function closeModal(event) {
        const modal = document.getElementById('{{ $id }}');
        if (!event || (event && event.target.id === '{{ $id }}')) {
            modal.classList.add('hidden');
        }
    }

    function openModal() {
        const modal = document.getElementById('{{ $id }}');
        modal.classList.remove('hidden');
    }
</script>
