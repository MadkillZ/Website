const chai = window.chai
const expect = chai.expect
//errorCheck = (id, name, category, price)
describe('errorCheck', () => {
  it('Every test worked out', () => {
    expect(errorCheck(27, "TEST1234", 4, 202.7)).to.deep.equal("")
    expect(errorCheck("Test", "TEST1234", 4, 202.7)).to.deep.equal("Id must be a number!")
    expect(errorCheck(27, "", 4, 202.7)).to.deep.equal("Name cannot be empty!")
    expect(errorCheck(27, "TEST1234", "f", 202.7)).to.deep.equal("Category must be a number!")
    expect(errorCheck(27, "TEST1234", 4, "")).to.deep.equal("Price cannot be empty!")
    expect(errorCheck(27, "TEST1234", 4, "TEST")).to.deep.equal("Price must be a number!")
  })
});