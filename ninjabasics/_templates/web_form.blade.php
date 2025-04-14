<form action="" method="">
    <h2>Create a New Ninja</h2>

    //ninja name
    <label for="name">Ninja Name:</label>
    <input type="text" id="name" name="name" required>

    //ninja strength
    <label for="skill">Ninja Skill (0-100):</label>
    <input type="number" name="skill" id="skill" required>

    //ninja bio
    <label for="bio">Biography:</label>
    <textarea rows="5" id="bio" name="bio" required></textarea>

    //select dojo
    <label for="dojo_id">Dojo:</label>
    <select name="dojo_id" id="dojo_id" required>
        <option value="" disabled selected>Select a dojo</option>
    </select>

    <button type="submit" class="btn mt-4">Create Ninja</button>
</form>
