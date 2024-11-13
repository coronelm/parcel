function showMessage() {
    alert("Farm Parcel Information Submitted!");
}

// Function to generate the farm parcel description fields dynamically based on the number of parcels


function generateParcelFields() {
    const numParcels = document.getElementById('numParcels').value;
    const parcelFieldsContainer = document.getElementById('parcelFields');

    // Clear any existing fields
    parcelFieldsContainer.innerHTML = '';

    for (let i = 1; i <= numParcels; i++) {
        let fieldset = document.createElement('fieldset');
        fieldset.innerHTML = `
            <legend>Farm Parcel ${i}</legend>
            <div class="form-row">
                <!-- Farm Location -->
                <div class="form-group">
                    <label for="location_${i}">Farm Location (Barangay):</label>
                    <select id="location_${i}" name="location_${i}" required>
                        <option value="adya">Adya</option>
                        <option value="anilao">Anilao</option>
                        <option value="anilao-labac">Anilao-Labac</option>
                        <option value="antipolodelnorte">Antipolo del Norte</option>
                        <option value="antipolodelsur">Antipolo del Sur</option>
                        <option value="bagongpook">Bagong Pook</option>
                        <option value="balintawak">Balintawak</option>
                        <option value="banaybanay">Banaybanay</option>
                        <option value="bolbok">Bolbok</option>
                        <option value="bugtongnapulo">Bugtong na Pulo</option>
                        <option value="bulacnin">Bulacnin</option>
                        <option value="bulaklakan">Bulaklakan</option>
                        <option value="calamias">Calamias</option>
                        <option value="cumba">Cumba</option>
                        <option value="dagatan">Dagatan</option>
                        <option value="duhatan">Duhatan</option>
                        <option value="halang">Halang</option>
                        <option value="inosluban">Inosluban</option>
                        <option value="kayumanggi">Kayumanggi</option>
                        <option value="latag">Latag</option>
                        <option value="lodlod">Lodlod</option>
                        <option value="lumbang">Lumbang</option>
                        <option value="mabini">Mabini</option>
                        <option value="malagonlong">Malagonlong</option>
                        <option value="malitlit">Malitlit</option>
                        <option value="marauoy">Marauoy</option>
                        <option value="mataasnalupa">Mataas na Lupa</option>
                        <option value="muntingpulo">Munting Pulo</option>
                        <option value="pagolinginbata">Pagolingin Bata</option>
                        <option value="pagolingineast">Pagolingin East</option>
                        <option value="pagolinginwest">Pagolingin West</option>
                        <option value="pangao">Pangao</option>
                        <option value="pinagkawitan">Pinagkawitan</option>
                        <option value="pinagtongulan">Pinagtongulan</option>
                        <option value="plaridel">Plaridel</option>
                        <option value="poblacionbarangay1">Poblacion Barangay 1</option>
                        <option value="poblacionbarangay2">Poblacion Barangay 2</option>
                        <option value="poblacionbarangay3">Poblacion Barangay 3</option>
                        <option value="poblacionbarangay4">Poblacion Barangay 4</option>
                        <option value="poblacionbarangay5">Poblacion Barangay 5</option>
                        <option value="poblacionbarangay6">Poblacion Barangay 6</option>
                        <option value="poblacionbarangay7">Poblacion Barangay 7</option>
                        <option value="poblacionbarangay8">Poblacion Barangay 8</option>
                        <option value="poblacionbarangay9">Poblacion Barangay 9</option>
                        <option value="poblacionbarangay9a">Poblacion Barangay 9-A</option>
                        <option value="poblacionbarangay10">Poblacion Barangay 10</option>
                        <option value="poblacionbarangay11">Poblacion Barangay 11</option>
                        <option value="poblacionbarangay12">Poblacion Barangay 12</option>
                        <option value="pusil">Pusil</option>
                        <option value="quezon">Quezon</option>
                        <option value="rizal">Rizal</option>
                        <option value="sabang">Sabang</option>
                        <option value="sampaguita">Sampaguita</option>
                        <option value="sanbenito">San Benito</option>
                        <option value="sancarlos">San Carlos</option>
                        <option value="sancelestino">San Celestino</option>
                        <option value="sanfrancisco">San Francisco</option>
                        <option value="sanguillermo">San Guillermo</option>
                        <option value="sanjose">San Jose</option>
                        <option value="sanlucas">San Lucas</option>
                        <option value="sansalvador">San Salvador</option>
                        <option value="sansebastian">San Sebastian</option>
                        <option value="santonino">Santo Niño</option>
                        <option value="santoribio">Santo Toribio</option>
                        <option value="sapac">Sapac</option>
                        <option value="sico">Sico</option>
                        <option value="talisay">Talisay</option>
                        <option value="tambo">Tambo</option>
                        <option value="tangob">Tangob</option>
                        <option value="tanguay">Tanguay</option>
                        <option value="tibig">Tibig</option>
                        <option value="tipacan">Tipacan</option>
                    </select>
                </div>

                <!-- Total Farm Area -->
                <div class="form-group">
                    <label for="totalArea_${i}">Size (ha):</label>
                    <input type="number" id="totalArea_${i}" name="totalArea_${i}" min="0" step="0.01" required>
                </div>

                <!-- Ownership Type -->
                <div class="form-group">
                    <label for="ownership_${i}">Ownership Type:</label>
                    <select id="ownership_${i}" name="ownership_${i}" required>
                        <option value="registered_owner">Registered Owner</option>
                        <option value="lessee">Lessee</option>
                        <option value="tenant">Tenant</option>
                    </select>
                </div>
            </div>

            <!-- Crop Commodity, Crop Type, and Crop Variety side by side -->
            <div class="crop-row">
                <div class="crop-group">
                    <label for="crop_${i}">Crop Commodity:</label>
                    <select id="crop_${i}" name="crop_${i}" required onchange="showCropType(${i})">
                        <option value="" disabled selected>Select Commodity</option>
                        <option value="grains">Grains</option>
                        <option value="plantation">Plantation Crops</option>
                        <option value="root_crops">Root Crops</option>
                        <option value="vegetables">Vegetables</option>
                        <option value="fruits">Fruits</option>
                    </select>
                </div>

                <div class="crop-group" id="cropTypeContainer_${i}">
                    <!-- Crop Type, Variety, Number of Trees, and Tree Status fields will be inserted here -->
                </div>
            </div>
        `;

        parcelFieldsContainer.appendChild(fieldset);
    }
}

// Function to show additional fields based on crop commodity
function showCropType(parcelIndex) {
    const cropCommodity = document.getElementById(`crop_${parcelIndex}`).value;
    const cropTypeContainer = document.getElementById(`cropTypeContainer_${parcelIndex}`);

    // Reset the container
    cropTypeContainer.innerHTML = '';

    // Define crop types for each commodity
    const cropTypes = {
        grains: ['Rice', 'Corn'],
        root_crops: ['Sweet Potato', 'Cassava', 'Ube/Yam', 'Ginger', 'Gabi'],
        vegetables: ['Ampalaya', 'Bell Pepper', 'Bush Sitao','Chayote', 'Cowpea', 'Cucumber', 'Eggplant', 'Hot Pepper', 'Lady Finger (okra)',
            'Lettuce', 'Mung Bean', 'Mustard', 'Pechay', 'Pole Sitao', 'Radish', 'Snap Beans', 'Soybeans', 'Squash', 'Tomato', 'Upo', 'Patola', 'Sigarilyas'],
        fruits: ['Avocado', 'Banana', 'Calamansi', 'Citrus', 'Pomelo', 'Papaya', 'Dragon Fruit', 'Durian', 'Guyabano', 'Jackfruit', 
            'Lanzones', 'Mango', 'Mango Pajo', 'Mangosteen', 'Pineapple', 'Rambutan', 'Santol', 'Tamarind', 'Pili'],
        plantation: ['Coconut', 'Coffee', 'Sugarcane', 'Black Pepper', 'Cacao']
    };

    if (cropTypes[cropCommodity]) {
        let cropTypeLabel = cropCommodity === 'fruits' ? 'Fruit Type' : 'Crop Type';
        let varietyLabel = cropCommodity === 'fruits' ? 'Fruit Variety' : 'Crop Variety';

        let cropTypeOptions = cropTypes[cropCommodity]
            .map(type => `<option value="${type}">${type}</option>`)
            .join('');

        // Add crop type, variety, and conditional fields for trees
        cropTypeContainer.innerHTML = `
            <label for="cropType_${parcelIndex}">${cropTypeLabel}:</label>
            <select id="cropType_${parcelIndex}" name="cropType_${parcelIndex}" required onchange="checkCustomCropType(${parcelIndex})">
                <option value="" disabled selected>Select ${cropTypeLabel}</option>
                ${cropTypeOptions}
                <option value="other">Other</option>
            </select>

            <input type="text" id="customCropType_${parcelIndex}" name="customCropType_${parcelIndex}" placeholder="Specify ${cropTypeLabel}" style="display:none;">

            <label for="cropVariety_${parcelIndex}">${varietyLabel}:</label>
            <input type="text" id="cropVariety_${parcelIndex}" name="cropVariety_${parcelIndex}">
        `;

        // If the commodity is Plantation Crops or Fruits, show number of trees and tree status
        if (cropCommodity === 'plantation' || cropCommodity === 'fruits') {
            cropTypeContainer.innerHTML += `
                <label for="numTrees_${parcelIndex}">Number of Trees:</label>
                <input type="number" id="numTrees_${parcelIndex}" name="numTrees_${parcelIndex}" min="1" step="1">

                <label for="treeStatus_${parcelIndex}">Tree Status:</label>
                <select id="treeStatus_${parcelIndex}" name="treeStatus_${parcelIndex}">
                    <option value="" disabled selected>Select Tree Status</option>
                    <option value="seedling">Seedling/Vegetative</option>
                    <option value="bearing">Bearing</option>
                    <option value="non-bearing">Non-bearing</option>
                </select>
            `;
        }
    } else {
        cropTypeContainer.innerHTML = '';
    }
}

// Function to show/hide custom crop type input
function checkCustomCropType(parcelIndex) {
    const cropTypeSelect = document.getElementById(`cropType_${parcelIndex}`);
    const customCropTypeInput = document.getElementById(`customCropType_${parcelIndex}`);

    if (cropTypeSelect.value === 'other') {
        customCropTypeInput.style.display = 'block';
        customCropTypeInput.required = true;
    } else {
        customCropTypeInput.style.display = 'none';
        customCropTypeInput.required = false;
    }
}