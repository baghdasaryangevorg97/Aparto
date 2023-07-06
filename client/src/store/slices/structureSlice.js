import { createSlice, createAsyncThunk } from "@reduxjs/toolkit";
import baseApi from "../../apis/baseApi";

const initialState = {
  loading: false,
  data: null,
  removed: false,
  added: false,
};

export const getStructureInfo = createAsyncThunk("structure", async () => {
  try {
    const { data } = await baseApi.get("/api/getFormStructure");
    return data;
  } catch (err) {
    console.log(`Get Structure Info Error: ${err.message}`);
  }
});

export const removeStructureField = createAsyncThunk(
  "structure/removeField",
  async ({ removedField }) => {
    try {
      await baseApi.post("/api/removeGlobalFormField", removedField);
    } catch (err) {
      console.log(`Remove Field Error: ${err.message}`);
    }
  }
);

export const addStructureField = createAsyncThunk(
  "structure/addField",
  async ({ addedField }) => {
    try {
      await baseApi.post("/api/addGlobalFormField", addedField);
    } catch (err) {
      console.log(`Add Field Error: ${err.message}`);
    }
  }
);

const structureSlice = createSlice({
  name: "structure",
  initialState,
  reducers: {},
  extraReducers: (builder) => {
    builder
      .addCase(getStructureInfo.pending, (state) => {
        state.loading = true;
      })
      .addCase(getStructureInfo.fulfilled, (state, action) => {
        state.loading = false;
        state.data = action.payload;
      })

      .addCase(removeStructureField.pending, (state) => {
        state.removed = false;
      })
      .addCase(removeStructureField.fulfilled, (state) => {
        state.removed = true;
      })

      .addCase(addStructureField.pending, (state) => {
        state.added = false;
      })
      .addCase(addStructureField.fulfilled, (state) => {
        state.added = true;
      });
  },
});

export default structureSlice.reducer;
