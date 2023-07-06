import { createSlice, createAsyncThunk } from "@reduxjs/toolkit";
import baseApi from "../../apis/baseApi";

const initialState = {
  loading: false,
  users: [],
};

export const getUsers = createAsyncThunk("users", async () => {
  try {
    const { data } = await baseApi.get("/api/getUsers");
    return data;
  } catch (err) {
    console.log(`Get Users Error: ${err.message}`);
  }
});

const userSlice = createSlice({
  name: "users",
  initialState,
  reducers: {},
  extraReducers: (builder) => {
    builder
      .addCase(getUsers.pending, (state) => {
        state.loading = true;
      })
      .addCase(getUsers.fulfilled, (state, action) => {
        state.loading = false;
        state.users = action.payload;
      });
  },
});

export default userSlice.reducer;
