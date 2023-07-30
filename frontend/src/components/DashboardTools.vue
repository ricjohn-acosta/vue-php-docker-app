<template>
  <div class="container">
    <FileUpload
      style="border-radius: 10px"
      mode="advanced"
      accept=".csv"
      custom-upload
      :choose-label="file ? file.name : 'Import CSV'"
      :multiple="false"
      :show-upload-button="!!file"
      :upload-label="file && ''"
      @uploader="handleUpload"
      @select="onSelect"
    >
      <template #header="{ chooseCallback, clearCallback }">
        <Button
          :label="file ? file.name : 'Import CSV'"
          rounded
          icon="pi pi-plus"
          @click="handleChoose(chooseCallback, clearCallback)"
        />
        <Button
          v-if="!!file"
          severity="success"
          rounded
          icon="pi pi-upload"
          @click="handleUpload()"
        />
        <Button
          v-if="!!file"
          severity="danger"
          rounded
          icon="pi pi-trash"
          @click="handleClearSelection(clearCallback)"
        />
      </template>
    </FileUpload>
  </div>
</template>

<script setup>
import { defineEmits,ref } from 'vue';
import FileUpload from 'primevue/fileupload';
import Button from 'primevue/button';
import { useToast } from "primevue/usetoast";
import axios from 'axios';
const toast = useToast();

const emit = defineEmits(['update-employees'])
const file = ref();

const onSelect = (e) => {
  const lastFileIndex = e.files.length-1
  file.value = e.files[lastFileIndex]
}

const handleChoose = (chooseCallback, clearCallback) => {
  clearCallback()
  chooseCallback()
}

const handleClearSelection = (clearCallback) => {
  clearCallback()
  file.value = null
}

const handleUpload = async () => {
  const formData = new FormData()
  formData.append('file', file.value)

  try {
    await axios.post(
      'http://localhost:5000/api/v1/employees/addEmployees.php',
      formData,
      {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      }).then((data) => {

      if (data.status === 200) {
        toast.add({ severity: 'success', summary: 'File uploaded.', life: 3000 });
      }
    })

    const res = await axios.get('http://localhost:5000/api/v1/employees/getEmployees.php')
    emit('update-employees', res.data)

  } catch (error) {
    toast.add({ severity: 'error', summary: 'Error uploading file.', life: 3000 });
  }

  file.value = null
}

</script>

<style scoped>
.container {
  margin-bottom: 10px;
}

::v-deep(.p-fileupload .p-fileupload-content) {
  display: none;
}

::v-deep(.p-fileupload .p-fileupload-buttonbar) {
  background: none;
  padding: 0;
  border: none;
}

::v-deep(.p-button-label) {
  background: none;
  padding: 0;
  border: none;
}

</style>
